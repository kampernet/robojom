// transient detection
// shred this and then use static variable
// 
//    ---  TRANS_DETECT.yup   ---
// 

public class TRANS_DETECT
{
    // Envelope Follower input patch
    adc => Gain g => OnePole leaky => blackhole;
    // square the input
    adc => g;
    // multiply
    3 => g.op;
    // set pole position
    .999 => leaky.pole;
    // used for slope calculation
    static float last;
    static float slope;

    // variable to keep track of if a transient occured
    false => static int yup;
    // update rate of detector
    10::ms => dur updateRate;
    
    fun void transDetect(){
        while(1){
            ( leaky.last() - last )$float / (.1) => slope;    
            leaky.last() => last;
            if( leaky.last() > 0.0001 && (slope > 0.001))
                true => yup;
            else
                false => yup;
            
            updateRate => now;
        }
        
    }
}

false => TRANS_DETECT.yup;
0 => TRANS_DETECT.slope;
0 => TRANS_DETECT.last;
TRANS_DETECT detector;
spork ~ detector.transDetect();
while(1){
    1::day=> now;
}