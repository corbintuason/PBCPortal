<template>

</template>

<script>
import FullCalendar from '@fullcalendar/vue'
import dayGridPlugin from '@fullcalendar/daygrid'

export default {
  components: {
    "calendar": FullCalendar
  },
  data(){
    return{
      calendarPlugins: [dayGridPlugin]
    }
  },
  mounted() {
    console.log("Component mounted.");
  }
};
</script>