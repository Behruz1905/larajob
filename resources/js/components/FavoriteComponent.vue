<template>
    <div>


                <button
                    v-if="!show"
                    @click.prevent="save()"
                    class="btn btn-warning"
                    style="width:150px">Save
                </button>

        <button
            v-else
            @click.prevent="unsave()"
            class="btn btn-dark"
            style="width:150px">Unsave
        </button>

    </div>
</template>

<script>
    export default {
        props:["jobid","favorited"],
        mounted() {
            this.show = this.jobFavorited ? true:false
        },
        data(){
            return {
                'show': true
            }
        },
        computed: {
            jobFavorited(){
                return this.favorited
            }
        },
        methods: {
            save() {
                axios.post('/save/' + this.jobid ).then(response =>

                         this.show = true).catch(error=>alert('error occured!'));
            },
            unsave(){
                axios.post('/unsave/' + this.jobid ).then(response =>

                    this.show = false).catch(error=>alert('error occured!'));
            }
        }

    }
</script>
