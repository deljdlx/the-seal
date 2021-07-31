<!DOCTYPE html>

<html>

<head>

<link rel="stylesheet" href="./the-seal.css"/>


</head>


<body>


<script src="./domToImage.js"></script>
<script src="./the-seal.js"></script>

<script>


console.log(document.location);

function theSeal() {
  this.parameters = {

    container: null,

    text: 'The Seal',
    radius: 100,
    crownRadius: 150,
    titleRadius: 100,

    gearSize: 50,
    crownSkewX: 0,
    crownSkewY: 0,
    crownScaleX: 0,
    crownScaleY: 0,

    gearRadius: 0,
    gearBorder: 5,

    borderColor: '#fff',
    borderSize: 8,

    crownColor: '#faa',
    textColor: '#f0f',
    rotationSpeed: 5,
  }

  const queryString = window.location.search;
  const urlParams = new URLSearchParams(queryString);

  for(let option in this.parameters) {
    let value = urlParams.get(option);

    if(value !== null) {
      this.parameters[option] = value;
    }
  }

  console.log(this.parameters);



  let size = this.parameters.radius;
  let image = './forest.jpg';
  let container

  if(!this.parameters.container) {
    container = document.body;
  }
  else {
    container = document.querySelector(this.parameters.container);
  }

  this.seal = new Seal(container, size, this.parameters.text, image);

  this.seal.setProperty('size', this.parameters.radius * 2);
  this.seal.setProperty('titleRadius', this.parameters.titleRadius);


  this.seal.setProperty('rotationSpeed', this.parameters.rotationSpeed);
  this.seal.setProperty('oscillationSpeed', 0);



  this.seal.setProperty('borderColor', this.parameters.borderColor);
  this.seal.setProperty('borderSize', this.parameters.borderSize);

  this.seal.setProperty('textColor', this.parameters.textColor);





  this.seal.setProperty('crownColor', this.parameters.crownColor);

  this.seal.setProperty('crownRadius', this.parameters.crownRadius, true);
  this.seal.setProperty('gearSize', this.parameters.gearSize, true);
  this.seal.setProperty('gearRadius', this.parameters.gearRadius, true);

  this.seal.setProperty('gearBorder', this.parameters.gearBorder, true);



  this.seal.setProperty('crownSkewX', this.parameters.crownSkewX, true);
  this.seal.setProperty('crownSkewY', this.parameters.crownSkewY, true);

  this.seal.setProperty('crownScaleY', this.parameters.crownScaleY, true);
  this.seal.setProperty('crownScaleX', this.parameters.crownScaleX, true);
  this.seal.setProperty('crownShadow', 10, true);

  // this.seal.render();
  this.seal.refresh();


/*
  setTimeout(() => {
    var node = document.querySelector('.the-seal');
    var options = {
        quality: 0.95
    };

    domtoimage.toJpeg(node, options).then(function (dataUrl) {
        // Do something with the dataURL (data:image/jpeg;base64,i........)
        var img = new Image();
        img.src = dataUrl;
        document.body.appendChild(img);
    });
  }, 500);
*/


  // domtoimage.toPng(node)

  /*
  domtoimage.toSvg(node)
    .then(function (dataUrl) {
        var img = new Image();
        img.src = dataUrl;
        document.body.appendChild(img);
        console.log(dataUrl)
    })
    .catch(function (error) {
        console.error('oops, something went wrong!', error);
    });
  */

}

theSeal();
</script>

</body>
</html>
