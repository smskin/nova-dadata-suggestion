<template>
    <default-field :field="field" :errors="errors">
        <template slot="field">
            <div
                v-click-outside="hideSuggestions"
                class="suggestion-wrapper clearfix">
                <input
                    :id="field.name"
                    type="text"
                    class="w-full form-control form-input form-input-bordered"
                    :class="errorClasses"
                    :placeholder="field.name"
                    v-model="value"
                    @focus="active=true"
                />
                <suggestion-list
                    v-show="active"
                    v-model="value"
                    v-on:select="onSelectSuggestion"
                ></suggestion-list>
            </div>
        </template>
    </default-field>
</template>

<style scoped>
    .suggestion-wrapper {
        position: relative;
        display: inline-block;
        direction: ltr;
        width: 100%;
    }
</style>

<script>
    import {FormField, HandlesValidationErrors} from 'laravel-nova'
    import SuggestionList from './SuggestionList';
    import vClickOutside from 'v-click-outside'

    export default {
        mixins: [FormField, HandlesValidationErrors],

        props: ['resourceName', 'resourceId', 'field'],

        components: {
            SuggestionList
        },

        directives: {
            clickOutside: vClickOutside.directive
        },

        data: function () {
            return {
                active: false
            }
        },

        methods: {
            /*
             * Set the initial, internal value for the field.
             */
            setInitialValue() {
                this.value = this.field.value || ''
            },

            /**
             * Fill the given FormData object with the field's internal value.
             */
            fill(formData) {
                formData.append(this.field.attribute, this.value || '')
            },

            /**
             * Update the field's internal value.
             */
            handleChange(value) {
                this.value = value
            },

            hideSuggestions(){
                this.active = false;
            },

            onSelectSuggestion(suggestion){
                this.hideSuggestions();
                this.value = suggestion.unrestricted_value;

                if (this.field.postalCode !== undefined){
                    Nova.$emit(this.field.postalCode + '-value', suggestion.data.postal_code);
                }
                if (this.field.country !== undefined){
                    Nova.$emit(this.field.country + '-value', suggestion.data.country);
                }
                if (this.field.federalDistrict !== undefined){
                    Nova.$emit(this.field.federalDistrict + '-value', suggestion.data.federal_district);
                }
                if (this.field.regionType !== undefined){
                    Nova.$emit(this.field.regionType + '-value', suggestion.data.region_type);
                }
                if (this.field.regionTypeFull !== undefined){
                    Nova.$emit(this.field.regionTypeFull + '-value', suggestion.data.region_type_full);
                }
                if (this.field.region !== undefined){
                    Nova.$emit(this.field.region + '-value', suggestion.data.region);
                }
                if (this.field.areaType !== undefined){
                    Nova.$emit(this.field.areaType + '-value', suggestion.data.area_type);
                }
                if (this.field.areaTypeFull !== undefined){
                    Nova.$emit(this.field.areaTypeFull + '-value', suggestion.data.area_type_full);
                }
                if (this.field.area !== undefined){
                    Nova.$emit(this.field.area + '-value', suggestion.data.area);
                }
                if (this.field.cityWithType !== undefined){
                    Nova.$emit(this.field.cityWithType + '-value', suggestion.data.city_with_type);
                }
                if (this.field.cityType !== undefined){
                    Nova.$emit(this.field.cityType + '-value', suggestion.data.city_type);
                }
                if (this.field.cityTypeFull !== undefined){
                    Nova.$emit(this.field.cityTypeFull + '-value', suggestion.data.city_type_full);
                }
                if (this.field.city !== undefined){
                    Nova.$emit(this.field.city + '-value', suggestion.data.city);
                }
                if (this.field.cityDistrictWithType !== undefined){
                    Nova.$emit(this.field.cityDistrictWithType + '-value', suggestion.data.city_district_with_type);
                }
                if (this.field.cityDistrictType !== undefined){
                    Nova.$emit(this.field.cityDistrictType + '-value', suggestion.data.city_district_type);
                }
                if (this.field.cityDistrictTypeFull !== undefined){
                    Nova.$emit(this.field.cityDistrictTypeFull + '-value', suggestion.data.city_district_type_full);
                }
                if (this.field.cityDistrict !== undefined){
                    Nova.$emit(this.field.cityDistrict + '-value', suggestion.data.city_district);
                }
                if (this.field.settlementWithType !== undefined){
                    Nova.$emit(this.field.settlementWithType + '-value', suggestion.data.settlement_with_type);
                }
                if (this.field.settlementType !== undefined){
                    Nova.$emit(this.field.settlementType + '-value', suggestion.data.settlement_type);
                }
                if (this.field.settlementTypeFull !== undefined){
                    Nova.$emit(this.field.settlementTypeFull + '-value', suggestion.data.settlement_type_full);
                }
                if (this.field.settlement !== undefined){
                    Nova.$emit(this.field.settlement + '-value', suggestion.data.settlement);
                }
                if (this.field.streetWithType !== undefined && suggestion.data.street !== null){
                    Nova.$emit(this.field.streetWithType + '-value', suggestion.data.street_type + '. ' + suggestion.data.street);
                }
                if (this.field.streetType !== undefined){
                    Nova.$emit(this.field.streetType + '-value', suggestion.data.street_type);
                }
                if (this.field.streetTypeFull !== undefined){
                    Nova.$emit(this.field.streetTypeFull + '-value', suggestion.data.street_type_full);
                }
                if (this.field.street !== undefined){
                    Nova.$emit(this.field.street + '-value', suggestion.data.street);
                }
                if (this.field.houseType !== undefined){
                    Nova.$emit(this.field.houseType + '-value', suggestion.data.house_type);
                }
                if (this.field.houseTypeFull !== undefined){
                    Nova.$emit(this.field.houseTypeFull + '-value', suggestion.data.house_type_full);
                }
                if (this.field.house !== undefined){
                    Nova.$emit(this.field.house + '-value', suggestion.data.house);
                }
                if (this.field.houseWithType !== undefined && suggestion.data.house !== null){
                    Nova.$emit(this.field.houseWithType + '-value', suggestion.data.house_type + '. ' + suggestion.data.house);
                }
                if (this.field.blockType !== undefined){
                    Nova.$emit(this.field.blockType + '-value', suggestion.data.block_type);
                }
                if (this.field.blockTypeFull !== undefined){
                    Nova.$emit(this.field.blockTypeFull + '-value', suggestion.data.block_type_full);
                }
                if (this.field.block !== undefined){
                    Nova.$emit(this.field.block + '-value', suggestion.data.block);
                }
                if (this.field.flatType !== undefined){
                    Nova.$emit(this.field.flatType + '-value', suggestion.data.flat_type);
                }
                if (this.field.flatTypeFull !== undefined){
                    Nova.$emit(this.field.flatTypeFull + '-value', suggestion.data.flat_type_full);
                }
                if (this.field.flat !== undefined){
                    Nova.$emit(this.field.flat + '-value', suggestion.data.flat);
                }
                if (this.field.flatWithType !== undefined && suggestion.data.flat !== null){
                    Nova.$emit(this.field.flatWithType + '-value', suggestion.data.flat_type + '. ' + suggestion.data.flat);
                }
                if (this.field.geoLat !== undefined){
                    Nova.$emit(this.field.geoLat + '-value', suggestion.data.geo_lat);
                }
                if (this.field.geoLon !== undefined){
                    Nova.$emit(this.field.geoLon + '-value', suggestion.data.geo_lon);
                }
            }
        },
        mounted() {
            this.popupItem = this.$el
        }
    }
</script>
