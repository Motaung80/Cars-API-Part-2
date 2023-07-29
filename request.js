const searchBtn = document.getElementById("searchBtn");
const carsQuery = document.getElementById("carsQuery");
//888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888
//888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888
const transmissionSelect = document.getElementById("transmissionSelect");                           //88888
const wheelDriveSelect = document.getElementById("wheelDriveSelect");                              //888888
const bodySelect = document.getElementById("bodySelect");                                         //8888888
const engineSelect = document.getElementById("carsQuery");                                       //88888888
//888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888
//888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888
const carsType = document.getElementById("carsType");
const carsDetails = document.getElementById("carsdetails");
const brandsDetails = document.getElementById("brandsdetails");

const apiUrl = 'api.php';
var CarsDataArr = [];

const apiKeyStorageKey = 'api_key';

const saveApiKeyToStorage = (apiKey) => {
  localStorage.setItem(apiKeyStorageKey, apiKey);
};

const getApiKeyFromStorage = () => {
  return localStorage.getItem(apiKeyStorageKey);
};

// Make AJAX request to get API key
const getApiKey = async () => {
  try {
    const apiKeyFromStorage = getApiKeyFromStorage();
    if (apiKeyFromStorage) {
      return apiKeyFromStorage;
    }

    const response = await fetch('getapikey.php');
    if (!response.ok) {
      throw new Error('Failed to retrieve API key');
    }
    const apiKey = await response.text();
    saveApiKeyToStorage(apiKey);
    return apiKey;
  } catch (error) {
    console.error(error);
    return null;
  }
};

// Use the retrieved API key in your request body
const makeRequest = async () => {
  const apikey = await getApiKey();
  if (!apikey) {
    console.error('No API key found');
    return;
  }
  const requestBody = {
    apikey: apikey,
    return: '*'
  };
  const requestOptions = {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify(requestBody)
  };
  try {
    const response = await fetch(apiUrl, requestOptions);
    if (!response.ok) {
      throw new Error('Failed to make request');
    }
    const data = await response.json();
    //console.log(data);
    CarsDataArr = data.data;
    console.log(CarsDataArr);
    displayCars();
    // Display cars data
  } catch (error) {
    console.error(error);
  }
};

window.onload = function() {
  makeRequest();
};

/**********************************************************************************/
/**************************** Search *********************************************/
/********************************************************************************/

searchBtn.addEventListener("click",function(){
  carsType.innerHTML="<h4>Search : "+carsQuery.value+"</h4>";
  fetchQueryCars();
});


const fetchQueryCars = async () => {
  const apikey = await getApiKey();
  if (!apikey) {
    console.error('No API key found');
    return;
  }
  if(carsQuery.value == null)
    return;
  const requestBody = {
    apikey: apikey,
    search: {
      make: carsQuery.value,
      },
    return: '*'
  };
      
  const requestOptions = {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify(requestBody)
  };
  try {
    const response = await fetch(apiUrl, requestOptions);
    if (!response.ok) {
      throw new Error('Failed to make request');
    }
    const data = await response.json();
    //console.log(data);
    CarsDataArr = data.data;
    console.log(CarsDataArr);
    displayCars();
    // Display cars data
  } catch (error) {
    console.error(error);
  }
};

/***********************************************************************************/
/**************************** End Search ******************************************/
/*********************************************************************************/
/****************************Preferences ****************************************/
/*******************************************************************************/
document.getElementById('allBtn').addEventListener('click', function() {
  // Make API request with no filters
  makeRequest();
});

document.getElementById('transmissionSelect').addEventListener('change', function() {
  // Make API request with transmission filter
  carsType.innerHTML="<h4>Search : "+carsQuery.value+"</h4>";
  fetchQueryPreferences();;
});

document.getElementById('engineSelect').addEventListener('change', function() {
  // Make API request with engine filter
  carsType.innerHTML="<h4>Search : "+carsQuery.value+"</h4>";
  fetchQueryPreferences();
});

document.getElementById('bodySelect').addEventListener('change', function() {
  // Make API request with body filter
  carsType.innerHTML="<h4>Search : "+carsQuery.value+"</h4>";
  fetchQueryPreferences();
});

document.getElementById('wheelDriveSelect').addEventListener('change', function() {
  // Make API request with wheel drive filter
  carsType.innerHTML="<h4>Search : "+carsQuery.value+"</h4>";
  fetchQueryPreferences();
});


const fetchQueryPreferences = async () => {
  const apikey = await getApiKey();
  if (!apikey) {
    console.error('No API key found');
    return;
  }
  if(carsQuery.value == null)
    return;
  const requestBody = {
    apikey: apikey,
    search: {},
    return: '*'
  };
  
  // Check if each parameter exists in the request body and add it to the search criteria if it does
  if (transmissionSelect.value) {
    requestBody.search.transmission = transmissionSelect.value;
  }
  
  if (wheelDriveSelect.value) {
    requestBody.search.drive_wheels = wheelDriveSelect.value;
  }
  
  if (bodySelect.value) {
    requestBody.search.body_type = bodySelect.value;
  }
  
  if (engineSelect.value) {
    requestBody.search.engine_type = engineSelect.value;
  }
  
      
  const requestOptions = {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify(requestBody)
  };
  try {
    const response = await fetch(apiUrl, requestOptions);
    if (!response.ok) {
      throw new Error('Failed to make request');
    }
    const data = await response.json();
    //console.log(data);
    CarsDataArr = data.data;
    console.log(CarsDataArr);
    displayCars();
    // Display cars data
  } catch (error) {
    console.error(error);
  }
};
/****************************************************************************************/
/***************************************************************************************/
/**************************************************************************************/
    
console.log("Below");
console.log(CarsDataArr);

async function displayCars() {
  carsDetails.innerHTML = "";
  for (const cars of CarsDataArr) {
    try {
      const URL_Img = await getImagee(cars.image_url);
      //console.log(make + " " + model + " " + URL_Img + " " + URL);
      if (URL_Img == "No Data") {
        console.log("No Data");
      } else {
        const image = document.createElement("img");
        image.setAttribute("height", "matchparent");
        image.setAttribute("width", "100%");
        image.src = URL_Img;

        const pro = document.createElement("div");
        pro.className = "product";

        const namePrice = document.createElement("div");
        namePrice.className = "namePrice";

        const namP = document.createElement("h3");
        namP.className = "card-title";
        namP.innerHTML = cars.make;

        const fit = document.createElement("div");
        fit.className = "fit";


        const discription1 = document.createElement("p");
        discription1.className = "text-1";
        
        discription1.innerHTML = `<img src="img/car_img/gasoline-pump.png" width="10%">${cars.engine_type}`;
        const discription2 = document.createElement("p");
        discription2.className = "text-2";
        discription2.innerHTML = `<img src="img/car_img/gear-shift.png" width="10%">${cars.transmission}`;
        const discription3 = document.createElement("p");
        discription3.className = "text-3";
        discription3.innerHTML = `<img src="img/car_img/car-engine.png" width="10%">${cars.number_of_cylinders}`;
        const discription4 = document.createElement("p");
        discription4.className = "text-4";
        discription4.innerHTML = `<img src="img/car_img/calendar.png" width="10%">${cars.year_from}`;
        const discription5 = document.createElement("p");
        discription5.className = "text-5";
        discription5.innerHTML = `<img src="img/car_img/wheel.png" width="10%">${cars.drive_wheels}`;


        namePrice.appendChild(namP);

        fit.appendChild(discription1);
        fit.appendChild(discription2);
        fit.appendChild(discription3);
        fit.appendChild(discription4);
        fit.appendChild(discription5);
        pro.appendChild(image);
        pro.appendChild(namePrice);
        pro.appendChild(fit);
        carsDetails.appendChild(pro);
      }
    } catch (error) {
      console.log(error);
    }
  }
};

function getImagee(URL) {
  return new Promise((resolve, reject) => {
    const req_img = new XMLHttpRequest();
    req_img.open("GET", URL, true);
    req_img.onreadystatechange = function() {
      if (this.readyState == 4) {
        if (this.status == 200) {
          const link_to_image = this.responseText;
          console.log(link_to_image);
          resolve(link_to_image); // Resolve the Promise with the image data
        } else {
          reject("Failed to retrieve image data"); // Reject the Promise with an error message
        }
      }
    };
    req_img.send();
  });
};
displayCars();

///////////////////////////////////////////////////////////////////

/////////////
document.getElementById('submitBtn').addEventListener('click', function() {
  const engine = document.getElementById('engineSelect').value;
  const body = document.getElementById('bodySelect').value;
  const wheel = document.getElementById('wheelDriveSelect').value;
  const transmission = document.getElementById('transmissionSelect').value;

  // Send data to server
  savePreferences(engine, body, wheel, transmission);
});

function savePreferences(engine, body, wheel, transmission) {
  const xhr = new XMLHttpRequest();
  xhr.open('POST', 'preferences.php', true);
  xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  xhr.onload = function() {
    if (this.status === 200) {
      // Success: update the UI with the retrieved preferences
      const response = JSON.parse(this.responseText);
      if (response.success && response.preferences) {
        const preferences = response.preferences;
        document.getElementById('engineSelect').value = preferences.engine;
        document.getElementById('bodySelect').value = preferences.body;
        document.getElementById('wheelDriveSelect').value = preferences.wheel;
        document.getElementById('transmissionSelect').value = preferences.transmission;
      }
    } else {
      // Error: do something
      console.error(this.statusText);
    }
  };
  xhr.onerror = function() {
    console.error('Error sending request');
  };
  xhr.send(`engine=${engine}&body=${body}&wheel=${wheel}&transmission=${transmission}`);
}