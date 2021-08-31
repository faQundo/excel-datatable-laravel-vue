<template>
  <div>
    <v-btn color="primary" elevation="2" rounded @click="newContract()"
      >New contract <v-icon right dark> mdi-cloud-upload </v-icon></v-btn
    >
    <div class="simple-table row-pointer">
      <v-data-table
        dense
        :headers="headers"
        :items="contracts"
        item-key="name"
        class="elevation-1"
        @click:row="handleClick"
      >
      <!-- <template v-slot:item.actions="{ item }">
      <v-icon
        small
        class="mr-2"
        @click="editItem(item)"
      >
        mdi-pencil
      </v-icon>
      <v-icon
        small
        @click="deleteItem(item)"
      >
        mdi-delete
      </v-icon>
    </template> -->
      </v-data-table>
    </div>
  </div>
</template>

<style  scoped>
.row-pointer >>> tbody tr :hover {
  cursor: pointer;
}
.simple-table {
  width: 700px;
  margin: auto;
  padding-top: 30px;
}
</style>
<script>
import axios from "../axios";

export default {
  created() {
    const thisIns = this;

    axios
      .get("/api/public/contracts")
      .then((response) => {
        thisIns.contracts = response.data;
      })
      .catch((error) => {
        console.log("ERROR,", error);
      });

    this.isMounted = true;
  },
  data: () => ({
    contracts: [],
    headers: [
      { text: "Contract", align: "start", value: "name" },
      { text: "Date", value: "date" },
    ],
  }),

  methods: {
    handleClick(item) {
      this.$router.push("/rates/edit/" + item.id).catch(() => {});
    },
    newContract() {
      this.$router.push("/upload").catch(() => {});
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
