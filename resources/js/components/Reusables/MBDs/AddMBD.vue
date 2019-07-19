<template>
  <div>
    <b-modal id="add-mbd" hide-footer>
      <div class="modal-header">
        <div class="modal-title">Add MBD</div>
      </div>
      <div class="modal-body">
        <!-- Input Name -->
        <div class="form-group">
          <label for="mbd_name">Enter MBD Name</label>
          <input
            v-model="mbd.name"
            id="mbd_name"
            type="text"
            name="name"
            placeholder="Enter MBD Name"
            class="form-control"
          />
        </div>

        <div class="form-group">
          <label for="mbd_agency">Agency</label>

          <select v-model="mbd.agency_id" name="agency_id" class="form-control">
            <option value selected disabled>Please Select an Agency</option>
            <option v-for="agency in agencies" :key="agency.id" :value="agency.id">{{agency.name}}</option>
          </select>
        </div>

        <!-- Input email -->
        <div class="form-group">
          <label for="mbd_start_date">MBD Start Date</label>

          <input
            v-model="mbd.start_date"
            id="mbd_start_date"
            type="date"
            name="start_date"
            placeholder="Enter Start Date"
            class="form-control"
          />
        </div>

        <!-- Input password -->
        <div class="form-group">
          <label for="mbd_end_date">MBD End Date</label>

          <input
            v-model="mbd.end_date"
            id="mbd_end_date"
            type="date"
            name="end_date"
            placeholder="Enter End Date"
            class="form-control"
          />
        </div>

        <!-- Select Role -->
        <div class="form-group">
          <label for="mbd_category">Category</label>
          <select v-model="mbd.category" id="mbd_category" name="category" class="form-control">
            <option value selected disabled>Select a Category</option>
            <option value="I">Category I</option>
            <option value="II">Category II</option>
            <option value="III">Category III</option>
          </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Schedule MBD</button>
      </div>
    </b-modal>
  </div>
</template>

<script>
export default {
  data() {
    return {
      calendarPlugins: [dayGridPlugin],
      mbd_dates: []
    };
  },
  props: {},
  components: {
    FullCalendar
  },

  methods: {
    loadMBDDates() {
      // this.mbd_dates.push({
      //   title: response.name,
      //   date: response.start_date,
      // })
      axios.get("/api/mbd").then(response =>
        response.data.data.forEach(mbd => {
          this.mbd_dates.push({
            title: mbd.name,
            start: mbd.start_date,
            end: mbd.end_date
          });
        })
      );
    }
  },
  mounted() {
    this.loadMBDDates();
  }
};
</script>