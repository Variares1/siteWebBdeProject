var count = 0;
var first = 0;
var buff = 0;
var pas = 0;

function swap(myId) {
		var myButton = document.getElementById(myId);

		count++;

		if(count == 1){
			first = myButton.id;
		}
		else if(count == 2){

			var button1 = document.getElementById(first);
			var button2 = document.getElementById(myButton.id);

			if (button1.className == "hole" || button2.className == "hole"){
				if(button1.id == button2.id-8
				|| button1.id == button2.id+8
				|| button1.id == button2.id-1
				|| button1.id == button2.id+1
				|| button2.id == button1.id-8
				|| button2.id == button1.id+8
				|| button2.id == button1.id-1
				|| button2.id == button1.id+1){

					buff = button1.className;

					button1.setAttribute("class", button2.className);
					button2.setAttribute("class", buff);

					pas++;
					document.getElementById("textDiv" ).innerHTML = "Nombre de pas : "+pas;
				}
				// else void window.alert("Impossible");
			}
			
			// // else void window.alert("Impossible");

			first = 0;
			buff = 0;
		}
		if (count >= 2)count = 0;
}