<template>
  <v-form
    ><!-- v-model="valid" -->
    <v-container>
      <v-row>
        <v-col cols="12" md="4">
          <v-text-field label="Nombre" v-model="contract.name"></v-text-field>
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
              v-model="contract.date"
              @input="menu2 = false"
            ></v-date-picker>
          </v-menu>
        </v-col>

        <v-col cols="12" md="4">
          <!-- :rules="rules" -->
          <v-file-input
            v-model="contract.file"
            accept="file/xls , file/xlsx"
            placeholder="Select excel file"
            label="Archivo"
          ></v-file-input>
        </v-col>
      </v-row>
    </v-container>
    <v-btn class="mr-4" @click="create()"> Guardar </v-btn>
  </v-form>
</template>

<script>
import axios from "../axios";
import Swal from "sweetalert2";

export default {
  data: () => ({
    /* contract: "", */
    contract: {
      name: "",
      date: "",
      file: "",
    },
    /* rules: [
      (value) =>
        !value ||
        value.size < 2000000 ||
        "Avatar size should be less than 2 MB!",
    ], */
    date: new Date(Date.now() - new Date().getTimezoneOffset() * 60000)
      .toISOString()
      .substr(0, 10),
    menu2: false,
  }),
  methods: {
    toFormData() {
      let formData = new FormData();

      formData.append("id", this.contract.id ? this.contract.id : null);
      formData.append("name", this.contract.name);
      if (!this.contract.date) {
        formData.append("date", null);
      } else {
        formData.append("date", this.contract.date);
      }

      if (this.contract.file) formData.append("file", this.contract.file);

      return formData;
    },

    create() {
      let formData = this.toFormData();

      axios
        .post(`/api/public/contracts`, formData)
        .then((res) => {
          if (res.status === 200) {
            /* toastr.success('Faq saved successfully', 'Success'); */
            Swal.fire({
              position: "center",
              icon: "success",
              title: "Your contract has been saved",
              showConfirmButton: false,
              timer: 2500,
            });
            this.$router.push("/contracts").catch(() => {});
          }
        })
        .catch((error) => {
          console.log(error);
        })
        .finally(() => {
          /* this.$router.push("/contracts").catch(() => {}); */
        });
    },
  },
};
</script>
