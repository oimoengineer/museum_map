<template>
  <div>
    <i
      v-on:click="storeOrDelete"
      :class="[isActiveTrue === true ? 'far fa-heart ml-3' : 'fas fa-heart ml-3']"
    ></i>
  </div>
</template>

<script>
export default {
  props: ["museumId", "likedData"],
  data() {
    return {
      isActiveTrue: this.likedData.includes(this.museumId) ? false : true
    };
  },
  methods: {
    change() {
      this.isActiveTrue = !this.isActiveTrue;
    },
    storeProductId() {
      axios
        .post("like/" + this.museumId, {
          museumId: this.museumId
        })
        .then(response => {
          console.log("success");
        })
        .catch(err => {
          console.log("error");
        });
    },
    deleteMuseumId() {
      axios
        .delete("like/" + this.museumId, {
          data: {
            museumId: this.museumId
          }
        })
        .then(response => {
          console.log("success");
        })
        .catch(err => {
          console.log("error");
        });
    },
    storeOrDelete() {
      const isTrue = this.likedData.includes(this.museumId);
      if (isTrue === true) {
        this.deleteMuseumId();
        this.change();
      } else {
        this.storeMuseumId();
        this.change();
      }
    }
  }
};
</script>
