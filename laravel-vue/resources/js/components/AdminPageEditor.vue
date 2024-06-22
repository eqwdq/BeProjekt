<template>
    <div>
      <AdminHeader />
      <div class="container">
        <br><br><br><br>
        <h3>{{ isEditing ? 'Edit Page' : 'Add New Page' }}</h3><br><br><br><br>
        <form @submit.prevent="onSubmit">
          <div class="form-group">
            <label for="pageTitle">Title:</label>
            <input type="text" class="form-control" id="pageTitle" v-model="page.title" required>
          </div>
          <div class="form-group">
            <label for="pageContent">Content:</label>
            <ckeditor :editor="editor" v-model="page.content"></ckeditor>
          </div>
          <br><br><br><br>
          <button type="submit" class="btn btn-primary purple-button">Submit</button>
        </form>
      </div>
    </div>
</template>

<script>
import AdminHeader from './AdminHeader.vue';
import CKEditor from '@ckeditor/ckeditor5-vue';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
import axios from 'axios';

export default {
  components: {
    AdminHeader,
    ckeditor: CKEditor.component
  },
  data() {
    return {
      editor: ClassicEditor,
      page: {
        title: '',
        content: ''
      },
      isEditing: false
    };
  },
  methods: {
    async onSubmit() {
      try {
        let response;
        if (this.isEditing) {
          response = await axios.put(`/admin/pages/${this.$route.params.id}`, this.page);
        } else {
          response = await axios.post('/admin/pages', this.page);
        }
        this.$router.push(`/pages/${response.data.id}`);
      } catch (error) {
        console.error('Error saving page:', error);
      }
    },
    async fetchPage() {
      try {
        const response = await axios.get(`/api/pages/${this.$route.params.id}`);
        this.page = response.data;
      } catch (error) {
        console.error('Error fetching page data:', error);
      }
    }
  },
  created() {
    if (this.$route.params.id) {
      this.isEditing = true;
      this.fetchPage();
    }
  }
};
</script>

<style scoped>
.purple-button {
  background-color: rgb(139, 72, 247);
  border-color: purple;
}
.purple-button:hover {
  background-color: rgb(139, 72, 247);
  border-color: rgb(185, 60, 238);
}
</style>
