// initialize the chuck application by importing the files needed

me.dir() + 'tempo/MockTempoDetector.ck' => tempoDetectorImplPath;
me.dir() + 'keyscale/MockKeyAndScaleDetector.ck' => keyAndScaleDetectorImplPath;

Machine.add(tempoDetectorImplPath);
Machine.add(keyAndScaleDetectorImplPath);