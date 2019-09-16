<template>
  <default-field :field="field" :errors="errors">
    <template slot="field">
      <input
        :id="field.name"
        type="text"
        class="w-full form-control form-input form-input-bordered"
        :class="errorClasses"
        :placeholder="field.name"
        v-model="value"
      />
      <div class="text-right my-3">
        <a
          :href="field.qrCodeRouteName + '/' + value"
          v-if="field.showUrl"
        >{{ field.qrCodeRouteName + '/' + value }}</a>
        <br>
        <button
          class="btn btn-default btn-primary inline-flex items-center relative mt-3"
          @click="generateQrCode"
          type="button"
        >Generate</button>
      </div>
    </template>
  </default-field>
</template>

<script>
import { FormField, HandlesValidationErrors } from "laravel-nova";

export default {
  mixins: [FormField, HandlesValidationErrors],

  props: ["resourceName", "resourceId", "field"],

  methods: {
    /*
     * Set the initial, internal value for the field.
     */
    setInitialValue() {
      //   this.value = this.field.value || "";
      this.value = "";
    },

    /**
     * Fill the given FormData object with the field's internal value.
     */
    fill(formData) {
      formData.append(this.field.attribute, this.value || "");
    },

    /**
     * Update the field's internal value.
     */
    handleChange(value) {
      this.value = value;
    },

    /**
     ** Generate Unique Qr Code
     */
    generateQrCode() {
      let chars = "abcdefghijklmnopqrstuvwxyz1234567890ABCDEFGHIJKLMNOP";
      var qrCode = "";
      var length = 15;
      if (this.field.length > 0) {
        length = this.field.length;
      }
      for (var x = 0; x < length; x++) {
        var i = Math.floor(Math.random() * chars.length);
        qrCode += chars.charAt(i);
      }
      this.value = qrCode;
    }
  }
};
</script>
