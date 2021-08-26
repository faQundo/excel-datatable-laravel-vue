<template>
<div>
    <div class="text-right pr-4">
<v-btn color="primary" elevation="2" rounded @click="newContract()"
      >Back<v-icon right dark> mdi-arrow-left</v-icon></v-btn
    >
    </div>
  <v-data-table
    dense
    :headers="headers"
    :items="desserts"
    item-key="name"
    class="elevation-1"
  ></v-data-table>
</div>
</template>

<script>
  export default {
    data: () => ({
      desserts: [
        {
          name: 'Frozen Yogurt',
          calories: 159,
          fat: 6.0,
          carbs: 24,
          protein: 4.0,
          iron: '1%',
        },
        {
          name: 'Ice cream sandwich',
          calories: 237,
          fat: 9.0,
          carbs: 37,
          protein: 4.3,
          iron: '1%',
        },
        {
          name: 'Eclair',
          calories: 262,
          fat: 16.0,
          carbs: 23,
          protein: 6.0,
          iron: '7%',
        },
        {
          name: 'Cupcake',
          calories: 305,
          fat: 3.7,
          carbs: 67,
          protein: 4.3,
          iron: '8%',
        },
        {
          name: 'Gingerbread',
          calories: 356,
          fat: 16.0,
          carbs: 49,
          protein: 3.9,
          iron: '16%',
        },
        {
          name: 'Jelly bean',
          calories: 375,
          fat: 0.0,
          carbs: 94,
          protein: 0.0,
          iron: '0%',
        },
        {
          name: 'Lollipop',
          calories: 392,
          fat: 0.2,
          carbs: 98,
          protein: 0,
          iron: '2%',
        },
        {
          name: 'Honeycomb',
          calories: 408,
          fat: 3.2,
          carbs: 87,
          protein: 6.5,
          iron: '45%',
        },
        {
          name: 'Donut',
          calories: 452,
          fat: 25.0,
          carbs: 51,
          protein: 4.9,
          iron: '22%',
        },
        /* rates */
        {
          origin: 'KitKat',
          destination: 518,
          currency: 26.0,
          twenty: 65,
          forty: 7,
          fortyhc: '6%',
        },
      ],
      headers: [
        {
          text: 'Nombre',
          align: 'start',
          sortable: false,
          value: 'name',
        },
        { text: 'Fecha', value: 'date' },
        { text: 'Origen', value: 'origin' },
        { text: 'Destino', value: 'destination' },
        { text: 'Tarifa 20', value: 'twenty' },
        { text: 'Tarifa 40', value: 'forty' },
        { text: 'Tarifa 40HC', value: 'fortyhc' },
        { text: 'Moneda', value: 'currency' },
      ],
    }),
  }
</script>
