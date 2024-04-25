var count = 0;
document.getElementById("myButton").onclick = function () {
    count++;
	if (count % 2 == 0) { 
        document.getElementById("demo").innerHTML = "";
	} else {
		var img = document.createElement("img");
        img.src = "https://static.tildacdn.com/tild6236-3236-4132-b636-316333386331/____.jpeg";
        document.getElementById("demo").appendChild(img);
	}
}