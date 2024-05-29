<template>
  <div id="app">
    <Header />
    <div>
      <div class="page-heading">
        <div class="overlay">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <ul class="breadcrumb">
                  <li :class="{ current: isCurrent('/') }"><router-link to="/">DOMOV</router-link></li>
                  <li class="active">PROGRAM</li>
                </ul>
                <h2>PROGRAM</h2>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="schedule-area page-section gray-bg">
        <div class="container">
          <div class="schedules">
            <div class="row no-margin">
              <div class="col-md-3 no-padding">
                <div class="schedule-title">
                  <h5>Date</h5>
                </div>
                <div class="schedule-date">
                  <ul class="nav nav-tabs" role="tablist">
                    <li
                      v-for="(schedule, index) in schedules"
                      :key="index"
                      :class="{ active: isActiveTab(index + 1) }"
                      @click="setActiveTab(index + 1)"
                    >
                      <a href="#">
                        <h4>{{ schedule.day }}</h4>
                        <h5>{{ schedule.sessions[0].title }}</h5>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="col-md-9 no-padding">
                <div class="schedule-details">
                  <div class="schedule-title">
                    <div class="row no-margin">
                      <div class="col-sm-3 no-padding">
                        <h5>Time</h5>
                      </div>
                      <div class="col-sm-9 no-padding">
                        <h5>SESSION TITLE</h5>
                      </div>
                    </div>
                  </div>
                  <div class="tab-content">
                    <div
                      v-for="(schedule, dayIndex) in schedules"
                      :key="dayIndex"
                      v-show="isActiveTab(dayIndex + 1)"
                    >
                      <div class="panel-group" role="tablist">
                        <div
                          v-for="(session, sessionIndex) in schedule.sessions"
                          :key="sessionIndex"
                          class="single-schedule panel panel-default"
                        >
                          <div class="panel-heading" role="tab">
                            <div class="panel-title single-schedule-title">
                              <a @click="toggleCollapse(dayIndex, sessionIndex)">
                                <div class="row no-margin">
                                  <div class="col-sm-3 no-padding">
                                    <h5>{{ session.time }}</h5>
                                  </div>
                                  <div class="col-sm-9 no-padding">
                                    <h5>{{ session.title }}</h5>
                                  </div>
                                </div>
                              </a>
                            </div>
                          </div>
                          <div
                            v-show="!isCollapsed(dayIndex, sessionIndex)"
                            class="panel-collapse collapse in"
                            role="tabpanel"
                          >
                            <div class="panel-body">
                              <div class="row no-margin">
                                <div class="col-sm-3 no-padding">
                                  <div class="schedule-img">
                                    <img :src="'/storage/' + session.image" alt="schedule" />
                                  </div>
                                </div>
                                <div class="col-sm-9 no-padding">
                                  <div class="schedule-info">
                                    <p><strong>Short Description:</strong> {{ session.short_description }}</p><br>
                                    <p><strong>Long Description:</strong> {{ session.long_description }}</p>
                                    <h5><br>
                                      <span>Speaker</span> : {{ session.speaker }}
                                    </h5><br><br><br>
                                    <a :href="session.speaker_link">Link</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- /.single-schedule -->
                      </div>
                      <!-- /.panel-group -->
                    </div>
                    <!-- /.tab-pane -->
                  </div>
                  <!-- /.tab-content -->
                </div>
                <!-- /.schedule-details -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.schedules -->
        </div>
      </div>
      <!-- /.schedule-area -->
    </div>
    <Footer />
  </div>
</template>

<script>
import Header from './Header.vue';
import Footer from './Footer.vue';
import axios from 'axios';

export default {
  name: 'Program',
  components: {
    Header,
    Footer
  },
  data() {
    return {
      activeTab: 1,
      collapsed: {},
      schedules: []
    };
  },
  methods: {
    isCurrent(path) {
      return this.$route.path === path;
    },
    isActiveTab(tab) {
      return this.activeTab === tab;
    },
    setActiveTab(tab) {
      this.activeTab = tab;
    },
    toggleCollapse(dayIndex, sessionIndex) {
      if (!this.collapsed[dayIndex]) {
        this.collapsed[dayIndex] = {};
      }
      this.collapsed[dayIndex][sessionIndex] = !this.collapsed[dayIndex][sessionIndex];
    },
    isCollapsed(dayIndex, sessionIndex) {
      return this.collapsed[dayIndex] && this.collapsed[dayIndex][sessionIndex];
    },
    async fetchPrograms() {
      try {
        const response = await axios.get('/api/admin/programs');
        const programs = response.data;
        this.schedules = this.formatProgramsToSchedules(programs);
      } catch (error) {
        console.error('Error fetching programs:', error);
      }
    },
    formatProgramsToSchedules(programs) {
      const groupedByDay = programs.reduce((acc, program) => {
        const { day } = program;
        if (!acc[day]) {
          acc[day] = [];
        }
        acc[day].push(program);
        return acc;
      }, {});

      return Object.keys(groupedByDay).map(day => ({
        day,
        sessions: groupedByDay[day]
      }));
    }
  },
  async mounted() {
    await this.fetchPrograms();
  }
};
</script>

<style scoped>
/* Add your custom styles here */
</style>





  
  