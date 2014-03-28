/** 
 * This class will manage the instruments and convert broadcasted events to 
 * note's being played by instruments
 */
class InstrumentManager {
	
	// holds the collection of instruments used in jomming
	StkInstrument instruments[];

	// add an instrument to the list of instruments
	function void addInstrument(StkInstrument inst) {

		//this.instruments []= inst;
	}
}

// keep the thread alive
while(true) {
	1::ms => now;
}