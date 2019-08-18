<template>
  <div>
    <heading class="mb-6">Subscribed Users And Items</heading>

    <card class="bg-90 flex flex-col items-center justify-center" style="min-height: 300px"></card>
  </div>
</template>

<script>
export default {
  data() {
    return {};
  },
  methods: {
    fetchSubscribedUsersAndItems() {
      Nova.request().get('/nova-vendor/subscribed-users-and-items')
        .then(response => {
          console.log(response);
        })
        .catch(err => {});
    }
  },
  mounted() {},
  created() {
      this.fetchSubscribedUsersAndItems()
  }
};
</script>

<style>
/* Scoped Styles */
</style>
