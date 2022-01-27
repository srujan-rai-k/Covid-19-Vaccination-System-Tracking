function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
      x.className += " responsive";
    } else {
      x.className = "topnav";
    }
  }


  $('.counter-count').each(function () {
    $(this).prop('Counter',0).animate({
        Counter: $(this).text()
    }, {
        duration: 5000,
        easing: 'swing',
        step: function (now) {
            $(this).text(Math.ceil(now));
        }
    });
});


function disableSubmit() {
  document.getElementById("submit-btn").disabled = true;
 }

  function activateButton(element) {

      if(element.checked) {
        document.getElementById("submit-btn").disabled = false;
        document.getElementById("submit-btn").style.backgroundColor = "lightblue";

       }
       else  {
        document.getElementById("submit-btn").disabled = true;
      }

  }



  var citiesByState = 
  {
      Karnataka : ["Bangalore","Mangalore","Mysore"],
      Maharashtra : ["Mumbai","Pune"],
      Rajasthan : ["Kota","Jaipur"],
      UttarPradesh: ["Lucknow","Kanpur","Varanasi"],
      AndhraPradesh: ["Hyderabad"]
  }
  function makeSubmenu(value) 
  {
      if(value.length==0) 
          document.getElementById("citySelect").innerHTML = "<option></option>";
      else 
      {
        var citiesOptions = "";
        for(cityId in citiesByState[value]) 
        {
          citiesOptions+="<option>"+citiesByState[value][cityId]+"</option>";
        }
        document.getElementById("citySelect").innerHTML = citiesOptions;
      }
  }

  function displaySelected() 
  { 
    var country = document.getElementById("countrySelect").value;
    var city = document.getElementById("citySelect").value;
    alert(country+"\n"+city);
  }
  function resetSelection() 
  {
    document.getElementById("countrySelect").selectedIndex = 0;
    document.getElementById("citySelect").selectedIndex = 0;
  }
  
