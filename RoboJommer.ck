class RoboJommer {
	
	function void jom() {

		<<< "we be jommin'" >>>;
	}
}

// keep the thread alive
RoboJommer jom;

while(true) {
	1::ms => now;
	jom.jom();
}