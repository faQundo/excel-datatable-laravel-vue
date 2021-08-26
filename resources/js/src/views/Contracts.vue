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
      ></v-data-table>
    </div>
    <!-- <div class="simple-table">
        <v-simple-table>
        <template v-slot:default>
        <thead>
            <tr>
            <th class="text-left">
                Name
            </th>
            <th class="text-left">
                Date
            </th>
            </tr>
        </thead>
        <tbody>
            <tr
            v-for="item in contracts"
            :key="item.name"
            >
            <td class="text-left">{{ item.name }}</td>
            <td class="text-left">{{ item.date }}</td>
            </tr>
        </tbody>
        </template>
    </v-simple-table>

    </div> -->
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
    desserts: [
      {
        name: "Frozen Yogurt",
        calories: 159,
        fat: 6.0,
        carbs: 24,
        protein: 4.0,
        iron: "1%",
      },
      {
        name: "Ice cream sandwich",
        calories: 237,
        fat: 9.0,
        carbs: 37,
        protein: 4.3,
        iron: "1%",
      },
      {
        name: "Eclair",
        calories: 262,
        fat: 16.0,
        carbs: 23,
        protein: 6.0,
        iron: "7%",
      },
      {
        name: "Cupcake",
        calories: 305,
        fat: 3.7,
        carbs: 67,
        protein: 4.3,
        iron: "8%",
      },
      {
        name: "Gingerbread",
        calories: 356,
        fat: 16.0,
        carbs: 49,
        protein: 3.9,
        iron: "16%",
      },
      {
        name: "Jelly bean",
        calories: 375,
        fat: 0.0,
        carbs: 94,
        protein: 0.0,
        iron: "0%",
      },
      {
        name: "Lollipop",
        calories: 392,
        fat: 0.2,
        carbs: 98,
        protein: 0,
        iron: "2%",
      },
      {
        name: "Honeycomb",
        calories: 408,
        fat: 3.2,
        carbs: 87,
        protein: 6.5,
        iron: "45%",
      },
      {
        name: "Donut",
        calories: 452,
        fat: 25.0,
        carbs: 51,
        protein: 4.9,
        iron: "22%",
      },
      {
        name: "KitKat",
        calories: 518,
        fat: 26.0,
        carbs: 65,
        protein: 7,
        iron: "6%",
      },
    ],
    headers: [
      /* {
          text: 'Dessert (100g serving)',
          align: 'start',
          sortable: false,
          value: 'name',
        }, */
      { text: "Contract", align: "start", value: "name" },
      { text: "Date", value: "date" },
      /* { text: 'Carbs (g)', value: 'carbs' },
        { text: 'Protein (g)', value: 'protein' },
        { text: 'Iron (%)', value: 'iron' }, */
    ],
  }),

  methods: {
      handleClick(item) {
       alert(JSON.stringify(item.id))
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
