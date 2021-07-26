<template>

  <v-app>


      <div ref="seal" class="seal-preview"></div>




      <div class="toolbar">


        <div>
          <h3>Text</h3>
          <v-text-field label="Text" v-model="parameters.text"></v-text-field>
        </div>


        <div>
          <h3>Radius</h3>
          <v-slider
            hint="Im a hint"
            max="350"
            min="50"
            v-model="parameters.radius"
          ></v-slider>
        </div>




        <div>
          <h3>Title Radius</h3>
          <v-slider
            hint="Im a hint"
            max="550"
            min="50"
            v-model="parameters.titleRadius"
          ></v-slider>
        </div>

        <div>
          <h3>Border width</h3>
          <v-slider
            hint="Im a hint"
            max="100"
            min="0"
            v-model="parameters.borderSize"
          ></v-slider>
        </div>


        <div>
          <h3>Crown Radius</h3>
          <v-slider
            hint="Im a hint"
            max="350"
            min="50"
            v-model="parameters.crownRadius"
          ></v-slider>
        </div>



        <div>
          <h3>Crown item size</h3>
          <v-slider
            hint="Im a hint"
            max="500"
            min="0"
            v-model="parameters.gearSize"
          ></v-slider>
        </div>


        <div>
          <h3>Crown item radius</h3>
          <v-slider
            hint="Im a hint"
            max="100"
            min="0"
            v-model="parameters.gearRadius"
          ></v-slider>
        </div>

        <div>
          <h3>Crown item border weight</h3>
          <v-slider
            hint="Im a hint"
            max="50"
            min="0"
            v-model="parameters.gearBorder"
          ></v-slider>
        </div>



        <div>
          <h3>Skew X</h3>
          <v-slider
            hint="Im a hint"
            max="200"
            min="0"
            v-model="parameters.crownSkewX"
          ></v-slider>
        </div>

        <div>
          <h3>Skew Y</h3>
          <v-slider
            hint="Im a hint"
            max="100"
            min="0"
            v-model="parameters.crownSkewY"
          ></v-slider>
        </div>


        <div>
          <h3>Scale x</h3>
          <v-slider
            hint="Im a hint"
            max="500"
            min="-50"
            v-model="parameters.crownScaleX"
          ></v-slider>
        </div>


        <div>
          <h3>Scale Y</h3>
          <v-slider
            hint="Im a hint"
            max="500"
            min="-50"
            v-model="parameters.crownScaleY"
          ></v-slider>
        </div>


        <div>
          <h3>Rotation speed</h3>
          <v-slider
            hint="Im a hint"
            max="50"
            min="0"
            v-model="parameters.rotationSpeed"
          ></v-slider>
        </div>



        <v-card>
          <v-card-title>Crown color</v-card-title>
          <v-card-text>
            <v-color-picker
              dot-size="25"
              swatches-max-height="200"
              hide-inputs
              v-model="parameters.crownColor"
            ></v-color-picker>
          </v-card-text>
        </v-card>


        <v-card>
          <v-card-title>Borders color</v-card-title>
          <v-card-text>
            <v-color-picker
              dot-size="25"
              swatches-max-height="200"
              hide-inputs
              v-model="parameters.borderColor"
            ></v-color-picker>
          </v-card-text>
        </v-card>


        <v-card>
          <v-card-title>Text color</v-card-title>
          <v-card-text>
            <v-color-picker
              dot-size="25"
              swatches-max-height="200"
              hide-inputs
              v-model="parameters.textColor"
            ></v-color-picker>
          </v-card-text>
        </v-card>
      </div>

  </v-app>

</template>

<script>

import Seal from './class/TheSeal.js';

export default {
  name: 'App',

  data: () => ({

    parameters: {

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
    },
    seal: null,
  }),

  mounted() {
    let size = this.parameters.radius;
    let image = 'https://ec.europa.eu/jrc/sites/default/files/styles/normal-responsive/public/fotolia-92027264european-day-forest-green-forest.jpg?itok=p4u8v1R5';

    this.seal = new Seal(this.$refs['seal'], size, this.parameters.text, image);

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
    this.seal.render();
  },

  watch: {
    parameters: {
      handler() {


        this.seal.setProperty('size', this.parameters.radius * 2);
        this.seal.setProperty('titleRadius', this.parameters.titleRadius);


        this.seal.setProperty('rotationSpeed', this.parameters.rotationSpeed);


        this.seal.setProperty('borderSize', this.parameters.borderSize);


        this.seal.setProperty('crownRadius', this.parameters.crownRadius);


        this.seal.setProperty('gearSize', this.parameters.gearSize, true);
        this.seal.setProperty('gearRadius', this.parameters.gearRadius, true);
        this.seal.setProperty('gearBorder', this.parameters.gearBorder, true);

        this.seal.setProperty('crownSkewX', this.parameters.crownSkewX, true);
        this.seal.setProperty('crownSkewY', this.parameters.crownSkewY, true);
        this.seal.setProperty('crownScaleY', this.parameters.crownScaleY, true);
        this.seal.setProperty('crownScaleX', this.parameters.crownScaleX, true);

        this.seal.setProperty('crownColor', this.parameters.crownColor);
        this.seal.setProperty('borderColor', this.parameters.borderColor);
        this.seal.setProperty('textColor', this.parameters.textColor);

        this.seal.refresh();


      },
      deep: true
    },

    /*
    rotationSpeed() {
      this.seal.setProperty('rotationSpeed', this.rotationSpeed);
    },
    radius() {
      this.seal.setProperty('radius', this.radius);
    },
    */
  }


};
</script>

<style>
@import 'assets/the-seal.css';

.theme--light.v-application {
  background: transparent !important;
}

.v-application--wrap {
  width: 200px;
}

.toolbar {
  background-color: rgba(0,0,0, 0.8);
  padding: 1rem;
  color: #fff;
  position: absolute;
  right: 0;
  height: 100vh;
  overflow: auto;
  width: 250px;
}
.seal-preview {
  position: relative;
  height: 100vh;
  width: 100vw;
}


</style>
