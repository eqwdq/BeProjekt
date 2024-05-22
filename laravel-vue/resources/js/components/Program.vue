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
                    <li :class="{ active: isActiveTab(1) }" @click="setActiveTab(1)">
                      <a href="#">
                        <h4>Day 1</h4>
                        <h5>24 DECEMBER</h5>
                      </a>
                    </li>
                    <li :class="{ active: isActiveTab(2) }" @click="setActiveTab(2)">
                      <a href="#">
                        <h4>Day 2</h4>
                        <h5>25 DECEMBER</h5>
                      </a>
                    </li>
                    <li :class="{ active: isActiveTab(3) }" @click="setActiveTab(3)">
                      <a href="#">
                        <h4>Day 3</h4>
                        <h5>26 DECEMBER</h5>
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
                    <div v-for="(schedule, dayIndex) in schedules" :key="dayIndex" v-show="isActiveTab(dayIndex + 1)">
                      <div class="panel-group" role="tablist">
                        <div v-for="(session, sessionIndex) in schedule.sessions" :key="sessionIndex" class="single-schedule panel panel-default">
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
                          <div v-show="!isCollapsed(dayIndex, sessionIndex)" class="panel-collapse collapse in" role="tabpanel">
                            <div class="panel-body">
                              <div class="row no-margin">
                                <div class="col-sm-3 no-padding">
                                  <div class="schedule-img">
                                    <img :src="session.image" alt="schedule" />
                                  </div>
                                </div>
                                <div class="col-sm-9 no-padding">
                                  <div class="schedule-info">
                                    <p>{{ session.description }}</p>
                                    <h5><span>With</span> : {{ session.speaker }} <small>Designer at <a :href="session.speakerLink">Google</a></small></h5>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div><!-- /.single-schedule -->
                      </div><!-- /.panel-group -->
                    </div><!-- /.tab-pane -->
                  </div><!-- /.tab-content -->
                </div><!-- /.schedule-details -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.schedules -->
        </div>
      </div><!-- /.schedule-area -->
    </div>
    <Footer />
  </div>
</template>

<script>
import Header from './Header.vue';
import Footer from './Footer.vue';

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
      schedules: [
        {
          day: '24 DECEMBER',
          sessions: [
            { time: '10:00 AM', title: 'Opening Ceremony', description: 'Opening ceremony description', speaker: 'John Doe', speakerLink: 'https://example.com', image: 'path/to/image1.jpg' },
            { time: '12:00 PM', title: 'Keynote', description: 'Keynote description', speaker: 'Jane Smith', speakerLink: 'https://example.com', image: 'path/to/image2.jpg' }
          ]
        },
        {
          day: '25 DECEMBER',
          sessions: [
            { time: '10:00 AM', title: 'Workshop 1', description: 'Workshop 1 description', speaker: 'John Doe', speakerLink: 'https://example.com', image: 'path/to/image1.jpg' },
            { time: '12:00 PM', title: 'Workshop 2', description: 'Workshop 2 description', speaker: 'Jane Smith', speakerLink: 'https://example.com', image: 'path/to/image2.jpg' }
          ]
        },
        {
          day: '26 DECEMBER',
          sessions: [
            { time: '10:00 AM', title: 'Panel Discussion', description: 'Panel Discussion description', speaker: 'John Doe', speakerLink: 'https://example.com', image: 'path/to/image1.jpg' },
            { time: '12:00 PM', title: 'Closing Ceremony', description: 'Closing ceremony description', speaker: 'Jane Smith', speakerLink: 'https://example.com', image: 'path/to/image2.jpg' }
          ]
        }
      ]
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
    }
  }
};
</script>

<style scoped>
/* Add your custom styles here */
</style>

  
  