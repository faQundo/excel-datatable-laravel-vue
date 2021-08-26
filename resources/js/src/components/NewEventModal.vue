<template>
  <v-row class="ml-4" justify="center" style="flex: none">
    <v-dialog v-model="dialog" persistent max-width="600px">
      <template v-slot:activator="{ on, attrs }">
        <v-btn color="primary" dark v-bind="attrs" v-on="on">
          <span>New event</span>
          <v-icon right> mdi-calendar-plus </v-icon>
        </v-btn>
      </template>
      <v-card>
        <v-card-title>
          <span class="text-h5">Create new event</span>
        </v-card-title>
        <v-card-text>
          <v-container>
            <v-row>

                <v-col cols="12" sm="6">
                  <v-text-field label="Title"></v-text-field>
                </v-col>
                <v-col cols="12" sm="6">
                <v-menu
                  ref="menu"
                  v-model="menu"
                  :close-on-content-click="false"
                  :return-value.sync="date"
                  transition="scale-transition"
                  offset-y
                  min-width="auto"
                >
                  <template v-slot:activator="{ on, attrs }">
                    <v-text-field
                      v-model="date"
                      label="Picker date"
                      prepend-icon="mdi-calendar"
                      readonly
                      v-bind="attrs"
                      v-on="on"
                    ></v-text-field>
                  </template>
                  <v-date-picker v-model="date" no-title scrollable>
                    <v-spacer></v-spacer>
                    <v-btn text color="primary" @click="menu = false">
                      Cancel
                    </v-btn>
                    <v-btn text color="primary" @click="$refs.menu.save(date)">
                      OK
                    </v-btn>
                  </v-date-picker>
                </v-menu>
              </v-col>
              <v-col cols="12" sm="6">
                <v-select
                  v-model="startTimeSelect"
                  :items="startTime"
                  attach
                  chips
                  label="Start time available"
                ></v-select>
              </v-col>
              <v-col cols="12" sm="6">
               <v-select
                  v-model="durationSelect"
                  :items="durationList"
                  attach
                  chips
                  label="Duration"
                ></v-select>
              </v-col>
              <v-col cols="12" sm="6">
                <v-select
                  v-model="statusSelect"
                  :items="statusList"
                  attach
                  chips
                  label="Status"
                ></v-select>
              </v-col>
            </v-row>
          </v-container>
          <small>*indicates required field</small>
        </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="blue darken-1" text @click="dialog = false">
            Close
          </v-btn>
          <v-btn color="blue darken-1" text @click="saveEvent"> Save </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-row>
</template>

<script>
export default {
  created() {
    const thisIns = this;
  },
  data: () => ({
    dialog: false,
    date: new Date(Date.now() - new Date().getTimezoneOffset() * 60000)
      .toISOString()
      .substr(0, 10),
    menu: false,
    startTime: ["foo", "bar", "fizz", "buzz"],
    startTimeSelect: [],
    duration: ["foo", "bar", "fizz", "buzz"],
    durationSelect: '',
    statusList: ["foo", "bar", "fizz", "buzz"],
    statusSelect: '',
  }),
  /* props: {
    date: Date,
  }, */
  methods: {
    saveEvent() {
      this.dialog = false;
    },
  },
};
</script>
