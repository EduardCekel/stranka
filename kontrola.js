function validateInput(element, validationFunction) {
    element.oninput = function (event) {
        let result = validationFunction(event.target.value);
        if (result != null) {
          document.getElementById("drM").innerHTML = "*Zadajte meyvyvyno";
        }
    }
}

  window.onload = function() {
    validateInput(document.getElementById("rM"), function (value = null) {
      if (value == null || value.length == 0) {
        let divko = document.getElementById("drM");
        divko.innerHTML = "*Zadajte meno";
        divko.style.color = "red";
        divko.style.fontSize = 15;
      } else { document.getElementById("drM").innerHTML = ""; }
    });

    validateInput(document.getElementById("rP"), function (value = null) {
      if (value == null || value.length == 0) {
        let divko = document.getElementById("drP");
        divko.innerHTML = "*Zadajte priezvisko";
        divko.style.color = "red";
        divko.style.fontSize = 15;
      } else { document.getElementById("drP").innerHTML = ""; }
    });

    validateInput(document.getElementById("rE"), function (value = null) {
      let re = new RegExp('^\\S+@\\S+\\.\\S+$');
      if (value == null || value.length == 0) {
        let divko = document.getElementById("drE");
        divko.innerHTML = "*Zadajte email";
        divko.style.color = "red";
        divko.style.fontSize = 15;
      } else if (!re.test(value)) {
        let divko = document.getElementById("drE");
        divko.innerHTML = "*Email nemá platný formát";
        divko.style.color = "red";
        divko.style.fontSize = 15;
    } else { document.getElementById("drE").innerHTML = ""; }
    });

    validateInput(document.getElementById("rH"), function (value = null) {
      if (value == null || value.length == 0) {
        let divko = document.getElementById("drH");
        divko.innerHTML = "*Zadajte heslo";
        divko.style.color = "red";
        divko.style.fontSize = 15;
      } else { document.getElementById("drH").innerHTML = ""; }
    });

    validateInput(document.getElementById("rHZ"), function (value = null) {
      if (value == null || value.length == 0) {
        let divko = document.getElementById("drHZ");
        divko.innerHTML = "*Zadajte heslo znova";
        divko.style.color = "red";
        divko.style.fontSize = 15;
      } else { document.getElementById("drHZ").innerHTML = ""; }
    });
    }