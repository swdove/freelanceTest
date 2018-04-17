<template>
    <input type="file" class="btn btn-default" accept="image/*" @change="onChange">
</template>

<script>
    export default {
        methods: {
            onChange(e) {
                //do we have a file?
                if (! e.target.files.length) return;

                let file = e.target.files[0];

                let reader = new FileReader();

                reader.readAsDataURL(file);

                reader.onload = e => {
                    let src = e.target.result;
                    this.$emit('loaded', { src, file })
                };
            }
        }
    }
    
</script>
