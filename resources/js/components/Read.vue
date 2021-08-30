<template>
  <div>
    <div class="row">
      <div class="col-md-12">
        <br>
        <br>
        <div class="row">
          <div class="col-md-10">
            <h4>e-Perpus (Admin)</h4>
          </div>
          <div class="col-md-2">
            <router-link class="btn btn-primary w-100" to="/create">+ Tambah</router-link>
          </div>
        </div>
        <br>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Picture</th>
              <th scope="col">Book</th>
              <th scope="col">Author</th>
              <th scope="col">Year Published</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="book in books" :key="book.id">
              <td style="width:20%">{{book.book_pic}}</td>
              <td style="width:20%">{{book.book_name}}</td>
              <td style="width:20%">{{book.author}}</td>
              <td style="width:20%">{{book.year_published}}</td>
              <td style="width:20%">
                <router-link class="btn btn-warning" :to="'/detail/'+book.id">Update</router-link>
                <button class="btn btn-danger" v-on:click="deleteData(book.id)">Delete</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      books: []
    };
  },
  created() {
    this.loadData();
  },
  methods: {
    loadData() {
      axios.get("http://localhost:8000/api/book").then(response => {
        this.books = response.data;
      });
    },
    deleteData(id) {
      axios.delete("http://localhost:8000/api/book/" + id).then(response => {
        this.loadData();
      });
    }
  }
};
</script>