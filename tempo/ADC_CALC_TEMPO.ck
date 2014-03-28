// started with: SIMPLE ENVELOPE FOLLOWER, by P. Cook
// 
// looks for 4 transients and averages time between for tempo
class TempoChangeEvent extends Event {
    
    int newTempo; // tempo in BPM
    int oldTempo;
}

TempoChangeEvent tempoEvent;

int sampleTime[4];
90 => int newTempo;
90 => int oldTempo;

float last;
0 => int n;
0 => int sampleCount;
0 => int timeZero;

float SPB;
int sum;
// loop on
0 => int gotIt;

//initially trigger a default tempo
<<< "newTempo: ", newTempo, "BPM ", "oldTempo: ", oldTempo, "BPM" >>>;
tempoEvent.newTempo => newTempo;
tempoEvent.oldTempo => oldTempo;
tempoEvent.signal();
0 => gotIt;
<<< "waiting for input" >>>;
while(1) {
    while(!gotIt){    
        while(n<4){
            if( TRANS_DETECT.last > 0.001 && (TRANS_DETECT.slope > 0.001) && sampleCount > 1000){
                if (n == 0)
                    0 => sampleTime[n];
                else
                    sampleCount => sampleTime[n];
                <<< n, sampleTime[n] >>>;
                n++;
                
                (44100 * (now/second))$int => timeZero;
            }
            (44100 * (now/second))$int - timeZero => sampleCount;
            // after 2 seconds of nothing, start over
            if (sampleCount > 44100 * 2)
                0 => n;
            1::ms => now;  
        }
        
        0 => sum;
        for (0=> int i; i < 4; i++){
            sampleTime[i] +=> sum;
        }
        (sum/3)$float / 44100 => SPB;
        60.0/SPB => float bpm;
        <<< "found possible tempo:", bpm, "BPM" >>>; 

        //sanity check
        if ((bpm > 165) || (bpm) < 70){
            0=>n;
        }
        
        500::ms => now;
        
        now + 5::second => time later;
        if (n>0){
            while(now < later && gotIt == 0){
                if (TRANS_DETECT.yup){
                    1 => gotIt;
                }
                10::ms => now;
            }
        }
        // start over
        0=>n;
    }

    newTempo => oldTempo;
    (60.0/SPB)$int => newTempo;
    <<< "newTempo: ", newTempo, "BPM ", "oldTempo: ", oldTempo, "BPM" >>>;
    tempoEvent.newTempo => newTempo;
    tempoEvent.oldTempo => oldTempo;
    tempoEvent.signal();
    0 => gotIt;

    //delay 1s and re-test
    1000::ms => now;
}