// initialize the chuck application by importing the files needed

me.dir() + "/tempo/MockTempoDetector.ck" => string tempoDetectorImplPath;
me.dir() + "/keyscale/MockKeyScaleDetector.ck" => string keyScaleDetectorImplPath;
me.dir() + "/instruments/InstrumentManager.ck" => string instrumentManagerPath;
me.dir() + "/RoboJommer.ck" => string roboJommer;

Machine.add(tempoDetectorImplPath);
Machine.add(keyScaleDetectorImplPath);
Machine.add(instrumentManagerPath);
Machine.add(roboJommer);
