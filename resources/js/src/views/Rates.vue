<template>
  <div>
    <div class="text-right pr-4">
      <v-btn color="primary" elevation="2" rounded @click="back()"
        >Back<v-icon right dark> mdi-arrow-left</v-icon></v-btn
      >
    </div>
    <div class="container-table p-3">
      <v-data-table
        dense
        :headers="headers"
        :items="rates"
        item-key="name"
        class="elevation-1"
      ></v-data-table>
    </div>
  </div>
</template>

<script>
import axios from "../axios";

export default {
  created() {
    if (this.$route.params.id !== undefined) {
      const thisIns = this;
      thisIns.isEdit = true;
      axios.get(`/api/public/rates/${this.$route.params.id}`)
        .then(res=>{
          thisIns.rates = res.data.data;
        })
        .catch((error) => {
          // toastr.success(error.message, 'Error');
          console.log('ERROR,', error)
        });
      //this.isMounted = true
    }

    this.isMounted = true;
  },
  data: () => ({
    rates: [],
    headers: [
      {
        text: "Nombre",
        align: "start",
        value: "name",
      },
      { text: "Fecha", value: "date" },
      { text: "Origen", value: "origin" },
      { text: "Destino", value: "destination" },
      { text: "Tarifa 20", value: "twenty" },
      { text: "Tarifa 40", value: "forty" },
      { text: "Tarifa 40HC", value: "fortyhc" },
      { text: "Moneda", value: "currency" },
    ],
  }),

  methods: {
    back() {
      this.$router.push("/contracts").catch(() => {});
    },
    remove(id, i) {
      axios
        .delete(`/api/public/contacts/create`, this.contracts)
        .then((res) => {
          if (res.status === 200) {
            //toastr.success('Faq saved successfully', 'Success');
            this.assessment.splice(i, 1);
          }
        })
        .catch((error) => {
          console.log(error);
        })
        .finally(() => {});
    },
  },
};
</script>
