<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="d-flex flex-wrap">
                <div class="col-4 card text-dark" v-for="postcard in postcards" :key="postcard.id">
                    <div class="card-header">{{postcard.sender}} -- {{postcard.address}}</div>

                    <div class="card-body">
                        <img :src="`/storage/postcards-images/${postcard.image}`" :alt="postcard.text" v-if="postcard.image" width="100px">
                        <span v-else class="text-danger">no image</span>
                        {{postcard.text}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                postcards: [],
            }
        },
        mounted() {
            axios   .get('/postcards/list')
                    .then(r => this.postcards = r.data)
                    .catch(e => console.error(e))
        }
    }
</script>
