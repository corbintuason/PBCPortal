<template>
  <div>
    <b-modal id="full-schedule" size="lg" hide-footer>
      <div class="modal-header">
        <div class="modal-title">Full Schedule</div>
      </div>
      <div class="modal-body">
        <FullCalendar
          defaultView="dayGridWeek"
          :events="mbd_dates"
          :plugins="calendarPlugins"
          :width="1000"
        ></FullCalendar>
      </div>
    </b-modal>
  </div>
</template>

<script>
import FullCalendar from "@fullcalendar/vue";
import dayGridPlugin from "@fullcalendar/daygrid";

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
      axios.get("/api/mbd_schedule").then(response => (
          response.data.data.forEach(mbd_schedule => {
              this.mbd_dates.push({
                  title: mbd_schedule.mbd.name,
                  start: mbd_schedule.date,
              })
          })
      ));

    }
  },
  mounted() {
    this.loadMBDDates();
  }
};
</script>