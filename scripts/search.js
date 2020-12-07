//window.setInterval(afterClick, 250);

//document.getElementById('btn').addEventListener('click',afterClick);

function afterClick(e){
    e.preventDefault();

    console.log("reached here");


    var request = new XMLHttpRequest();
    request.open('GET','search_advanced.php',true);

    request.onload = function() {
        if(request.status = 200){
            console.log("request loaded");
            //document.getElementById("name_search").submit();

            showArticle();
        }
    }

    request.send();
}


function showArticle(){
    
    let section = document.createElement('section');
    section.setAttribute('id','profile');

    let image = document.createElement('div');
    image.setAttribute('class','image');

    let img = document.createElement('img');

    img.setAttribute('src','./images/dog.JPG');
    img.setAttribute('width','200');
    img.setAttribute('height','200');
    img.setAttribute('alt','image missing');

    image.appendChild(img);

    let info = document.createElement('div');
    info.setAttribute('class','info');


    let name = document.getElementById("searchName");  

    let gender = document.querySelector('input[name="genderSearch"]:checked').value;
    
    let species = document.querySelector('input[name="speciesSearch"]:checked').value;
    let size = document.querySelector('input[name="sizeSearch"]:checked').value;
    let color = document.getElementById("searchColor");


    let p1 = document.createElement('p');
    let a = document.createElement('a');
    a.setAttribute('href','pet');
    p1.innerHTML = a; 


    let p2 = document.createElement('p');
    p2.innerHTML = "Race: " + species;

    let p3 = document.createElement('p');
    p3.innerHTML = "Gender: " + gender;

    let p4 = document.createElement('p');
    p4.innerHTML = "Size: " + size;

    let p5 = document.createElement('p');
    p5.innerHTML = "Color: " + color;

    let p6 = document.createElement('p');
    p6.innerHTML = "Localization:"


    info.appendChild(p1);
    info.appendChild(p2);
    info.appendChild(p3);
    info.appendChild(p4);
    info.appendChild(p5);
    info.appendChild(p6);


    section.appendChild(image);
    section.appendChild(info);

    console.log(section);


    articles = getPetsByAll(name,species,gender,size,color);

    console.log(articles);
    
  }

