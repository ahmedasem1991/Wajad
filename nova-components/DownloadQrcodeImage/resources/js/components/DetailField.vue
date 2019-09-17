<template>
  <div class="flex border-b border-40">
    <div class="w-1/4 py-4">
      <slot>
        <h4 class="font-normal text-80">Download Qrcode Image</h4>
      </slot>
    </div>
    <div class="w-3/4 py-4">
      <slot name="value">
        <p style="display: inline-block">
          <a
            href
            :download="field.qrcodeUrl + '.png'"
            id="image-downloader"
            v-show="download"
            class="btn btn-default bg-primary btn-icon text-white text-center"
          >
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
              <path
                class="fill-current text-white"
                style="margin-right: 5px"
                d="M11 14.59V3a1 1 0 0 1 2 0v11.59l3.3-3.3a1 1 0 0 1 1.4 1.42l-5 5a1 1 0 0 1-1.4 0l-5-5a1 1 0 0 1 1.4-1.42l3.3 3.3zM3 17a1 1 0 0 1 2 0v3h14v-3a1 1 0 0 1 2 0v3a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-3z"
              />
            </svg>
            Download Qrcode
          </a>
          <a
            v-show="!download"
            @click="downloadQrCode"
            class="btn btn-default bg-primary btn-icon text-white text-center"
            style="cursor:pointer;"
          >Convert Into Image</a>
        </p>
      </slot>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      download: false,
    };
  },
  props: ["resource", "resourceName", "resourceId", "field"],
  methods: {
    downloadQrCode() {
      let qrcode = document.getElementsByClassName("qr-item")[0].firstChild.src;
      let imageDownload = document
        .getElementById("image-downloader")
        .setAttribute("href", qrcode);
      this.download = true;
    }
  }
};
</script>
