<template>
    <div class="ap-suggestion" role="option" v-on:click="select">
        <span class="ap-suggestion-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 14 20">
                <path
                    d="M7 0C3.13 0 0 3.13 0 7c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5C5.62 9.5 4.5 8.38 4.5 7S5.62 4.5 7 4.5 9.5 5.62 9.5 7 8.38 9.5 7 9.5z"></path>
            </svg>
        </span>
        <span class="ap-address">{{ suggestion.value }}</span>
    </div>
</template>

<style scoped>
    .ap-suggestion {
        cursor: pointer;
        height: 46px;
        line-height: 46px;
        padding-left: 18px;
        overflow: hidden;
    }

    .ap-suggestion:hover {
        background: #efefef;
    }

    .ap-suggestion-icon, .ap-name, .ap-address {
        white-space: normal;
    }
</style>

<script>
    export default {
        props: {
            suggestion: Object
        },
        methods: {
            select() {
                this.$emit('select', this.suggestion)
            }
        }
    }
</script>
