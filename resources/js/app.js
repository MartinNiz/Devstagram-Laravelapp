import Dropzone from "dropzone";

Dropzone.autoDiscover = false;

const dropzone = new Dropzone('#dropzone', {
  dictDefaultMessage: 'Add image',
  acceptedFiles: '.png,.jpg,.jpeg,.gif',
  addRemoveLinks: true,
  dictRemoveFile: 'Delete',
  maxFiles: 1,
  uploadMultiple: false,

  init: function () {
    if (document.querySelector('input[name="image"]').value.trim()) {
      const postedImage = {};
      postedImage.size = 1234;
      postedImage.name = document.querySelector('input[name="image"]').value;

      this.options.addedfile.call(this, postedImage );
      this.options.thumbnail.call(this, postedImage, `/uploads/${postedImage.name}`);

      postedImage.previewElement.classList.add('dz-success', 'dz-complete')
    }
  }
});

dropzone.on('success', function (file, response) {
  document.querySelector('input[name="image"]').value = response.image;
})

dropzone.on('removedfile', function(){
  document.querySelector('input[name="image"]').value = '';
})