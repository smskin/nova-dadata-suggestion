## Address suggestion field for Laravel Nova
Based on https://github.com/fomvasss/laravel-dadata package

### Installation
- composer require smskin/nova-dadata-suggestion
- php artisan vendor:publish --provider="SMSkin\DaDataSuggestion\FieldServiceProvider"
- add the variables DADATA_TOKEN and DADATA_SECRET to .env file and fill it

### Using
- Create the full address field
- Link it to other fields
- Use the suggestion for fill depend fields

```
 private function addressFields()
    {
        return [
            DaDataSuggestion::make('DaData','address')
                ->city('address_city')
                ->flat('address_flat')
                ->street('address_street')
                ->house('address_house')
                ->geoLat('coordinate_lat')
                ->geoLon('coordinate_lon'),

            Text::make('Город', 'address_city')
                ->hideFromIndex(),
            Text::make('Улица', 'address_street')
                ->hideFromIndex(),
            Text::make('Дом', 'address_house')
                ->hideFromIndex(),
            Text::make('Офис', 'address_flat')
                ->hideFromIndex(),
            Text::make('Широта', 'coordinate_lat')
                ->hideFromIndex(),
            Text::make('Долгота', 'coordinate_lon')
                ->hideFromIndex()
        ];
    }
```

Available fields:
- postalCode
- country
- federalDistrict
- regionType
- regionTypeFull
- region
- areaType
- areaTypeFull
- area
- cityWithType
- cityType
- cityTypeFull
- city
- cityDistrictWithType
- cityDistrictType
- cityDistrictTypeFull
- cityDistrict
- settlementWithType
- settlementType
- settlementTypeFull
- settlement
- streetWithType
- streetType
- streetTypeFull
- street
- houseType
- houseTypeFull
- houseWithType
- house
- blockType
- blockTypeFull
- block
- flatType
- flatTypeFull
- flat
- flatWithType
- geoLat
- geoLon
