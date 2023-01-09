var generator = document.getElementById("generator");
generator.style.display = "none";

var openGenerator = document.getElementById("generatorButton");
var closeGenerator = document.getElementById("close");
openGenerator.innerHTML = "hello";

var showPopUp = function() {
  generator.style.display = "block";
};

var hidePopUp = function() {
  generator.style.display = "none";
};

openGenerator.addEventListener("click", showPopUp);
closeGenerator.addEventListener("click", hidePopUp);


//instead of doing a window popup, i could do a sort of toggle thing?
//might not look as good but it would be easier to get the x working
