<template>
  <div>
    <div class="row">
      <div class="col-md-6">
        <br>
        <br>
        <h4><button class="btn btn-danger p-1" @click="$router.go(-1)">Cancel</button>&nbsp;&nbsp;Update data</h4>
        <br>
        <!-- prevent form submit untuk reload halaman, kemudian memanggil function updateData() -->
        <form v-on:submit.prevent="updateData()">
          <div class="form-group">
            <!--<label>Book picture</label>
            <input
              type="file"
              class="form-control"
              placeholder="Input book picture"
              v-model="form.book_pic"
              required
            >
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
            <label>Year published</label>
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
  data() {
    return {
      form: {
        //book_pic: "",
        book_name: "",
        author: "",
        year_published: ""
      }
    };
  },
  /*uploadImage(event) {
        const image = e.target.files[0];
        const reader = new FileReader();
        reader.readAsDataURL(image);
        reader.onload = e =>{
            this.previewImage = e.target.result;
            console.log(this.previewImage);
        };
  },*/
  created() {
    // load data saat pertama kali halaman dibuka
    this.loadData();
  },
  methods: {
    loadData() {
      // load data berdasarkan id
      axios
        .get("http://localhost:8000/api/book/" + this.$route.params.id)
        .then(response => {
          // post value yang dari response ke form
          //this.form.book.pic = response.data.book_pic;
          this.form.book_name = response.data.book_name;
          this.form.author = response.data.author;
          this.form.year_published = response.data.year_published;
        });
    },
    updateData() {
      // put data ke api menggunakan axios
      axios
        .put("http://localhost:8000/api/book/" + this.$route.params.id, {
          //book_pic: this.form.book.pic,
          book_name: this.form.book_name,
          author: this.form.author,
          year_published: this.form.year_published
        })
        .then(response => {
          // push router ke read data
          this.$router.push("/");
        });
    }
  }
};
</script>