// initialize the chuck application by importing the files needed

me.dir() + 'tempo/MockTempoDetector.ck' => tempoDetectorImplPath;
me.dir() + 'keyscale/MockKeyAndScaleDetector.ck' => keyAndScaleDetectorImplPath;
me.dir() + 'instruments/InstrumentManager.ck' => instrumentManagerPath;
me.dir() + 'RoboJommer.ck' => roboJommer;

Machine.add(tempoDetectorImplPath);
Machine.add(keyAndScaleDetectorImplPath);
Machine.add(instrumentManagerPath);
Machine.add(roboJommer);

RoboJommer => jom;
while(true) {
	1::ms => now;
	jom.jom();	
}
