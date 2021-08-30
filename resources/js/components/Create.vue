<template>
  <div>
    <div class="row">
      <div class="col-md-6">
        <br>
        <br>
        <h4><button class="btn btn-danger p-1" @click="$router.go(-1)">Cancel</button>&nbsp;&nbsp;Create new data</h4>
        <br>
        <!-- prevent form submit untuk reload halaman, kemudian memanggil function addData() -->
        <form v-on:submit.prevent="addData()">
          <div class="form-group">
            <!--<label>Book picture</label><br/>
            <input
              type="file"
              class="form-control"
              placeholder="Input book picture"
              v-model="form.book_pic"
              required
            >-
          <input type="file" accept="image/*" v-on:change="uploadImage($event)" id="file-input" required>-->
          </div>
          <div class="form-group">
            <label>Book name</label>
            <input
              type="textfield"
              class="form-control"
              placeholder="Input book name"
              v-model="form.book_name"
              required
            >
          </div>
          <div class="form-group">
            <label>Author</label>
            <input
              type="textfield"
              class="form-control"
              placeholder="Input author"
              v-model="form.author"
              required
            >
          </div>
          <div class="form-group">
            <label>Year Published</label>
            <input
              type="textfield"
              class="form-control"
              placeholder="Input year published"
              v-model="form.year_published"
              required
            >
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data(){
    return{
      form:{
        //book_pic: '',
        book_name: '',
        author: '',
        year_published: ''
      }
    }
  },
  methods: {
    /*uploadImage(event) {
        const image = e.target.files[0];
        const reader = new FileReader();
        reader.readAsDataURL(image);
        reader.onload = e =>{
            this.previewImage = e.target.result;
            console.log(this.previewImage);
        };
    },*/

    addData() {
      // post data ke api menggunakan axios
      axios
        .post("http://localhost:8000/api/book", {
          //book_pic: this.form.book_pic,
          book_name: this.form.book_name,
          author: this.form.author,
          year_published: this.form.year_published
        })
        .then(response => {
          // push router ke read data
          this.$router.push("/");
        });
    },
  }
};
</script>
