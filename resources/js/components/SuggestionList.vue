<template>
    <span class="ap-dropdown-menu active ap-with-places" role="listbox" id="algolia-places-listbox-0">
                <div class="ap-dataset-places">
                    <span class="ap-suggestions">
                        <suggestion
                            v-for="item in suggestions"
                            :suggestion="item"
                            :key="item.value"
                            v-on:select="onSelect"
                        ></suggestion>
                    </span>
               </div>
            </span>
</template>

<style scoped>
    .ap-dropdown-menu {
        width: 100%;
        background: #ffffff;
        box-shadow: 0 1px 10px rgba(0, 0, 0, 0.2), 0 2px 4px 0 rgba(0, 0, 0, 0.1);
        border-radius: 3px;
        margin-top: 3px;
        overflow: hidden;
    }

    .ap-dropdown-menu.active {
        position: absolute;
        top: 100%;
        z-index: 100;
        left: 0;
        right: auto;
        display: block;
    }

    .ap-suggestions {
        display: block;
    }
</style>

<script>
    import Suggestion from "./Suggestion";
    import axios from "axios";

    export default {
        components: {
            Suggestion
        },
        props: {
            value: String
        },
        data: function(){
            return {
                cancel: null,
                suggestions: []
            }
        },
        watch: {
            value: function(){
                this.sendRequest();
            }
        },
        methods: {
            sendRequest() {
                if (this.cancel !== null) {
                    this.cancel();
                    this.cancel = null;
                }

                this.suggestions = [];
                Nova.request(
                    {
                        url: '/vendor/smskin/nova-dadata-suggestion/query',
                        method: 'POST',
                        data: {
                            q: this.value
                        },
                        cancelToken: new axios.CancelToken((c) => {
                            this.cancel = c;
                        }),
                    })
                    .then((response) => {
                        this.suggestions = response.data
                    })
                    .catch(() => {

                    });
            },
            onSelect(suggestion){
                this.$emit('select',suggestion);
            }
        }
    }
</script>
