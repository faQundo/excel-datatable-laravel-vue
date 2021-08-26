<template>
  <v-form v-model="valid">
    <v-container>
      <v-row>
        <v-col cols="12" md="4">
          <v-text-field
            label="Nombre"
            v-model="contract"
            ></v-text-field>
        </v-col>

        <v-col cols="12" md="4">
          <v-menu
        v-model="menu2"
        :close-on-content-click="false"
        :nudge-right="40"
        transition="scale-transition"
        offset-y
        min-width="auto"
      >
        <template v-slot:activator="{ on, attrs }">
          <v-text-field
            v-model="date"
            label="Fecha"
            prepend-icon="mdi-calendar"
            readonly
            v-bind="attrs"
            v-on="on"
          ></v-text-field>
        </template>
        <v-date-picker
          v-model="date"
          @input="menu2 = false"
        ></v-date-picker>
      </v-menu>
        </v-col>

        <v-col cols="12" md="4">
          <v-file-input
            :rules="rules"
            accept="file/xls , file/xlsx"
            placeholder="Select excel file"
            label="Archivo"
          ></v-file-input>
        </v-col>
      </v-row>
    </v-container>
    <v-btn class="mr-4" type="submit"> Guardar </v-btn>
  </v-form>
</template>

<script>
export default {
  data: () => ({
    contract: '',
    rules: [
      (value) =>
        !value ||
        value.size < 2000000 ||
        "Avatar size should be less than 2 MB!",
    ],
    date: new Date(Date.now() - new Date().getTimezoneOffset() * 60000)
      .toISOString()
      .substr(0, 10),
    menu2: false,
  }),
};
</script>
