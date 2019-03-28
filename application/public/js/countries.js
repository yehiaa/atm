function initializeCountryAndCityControls(countrySelector, citySelector, dropdownParentSelector, callback){
    countrySelector = countrySelector || '#country';
    citySelector = citySelector || '#city';

    console.info(countrySelector, citySelector, dropdownParentSelector);
    $.getJSON('/json/countries.json', [], function (data) {
        var $country = $(countrySelector);
        $country.select2({
            dropdownParent: dropdownParentSelector ? $(dropdownParentSelector) : null,
            placeholder: 'Select country',
            data: $.map(Object.keys(data), function (item) {
                return {
                    text: item,
                    id: item
                }
            })
        });
        // return;
        $country.on('change', function (e) {
            $(citySelector).empty();
            var selectedCountry = $(countrySelector+" option:selected").text();
            if (! selectedCountry) return;
            $(citySelector).select2({
                dropdownParent: dropdownParentSelector ? $(dropdownParentSelector) : null,
                placeholder: '',
                data: $.map(data[selectedCountry], function (item) {
                    return {
                        text: item,
                        id: item
                    }
                })
            });
        });

        if (callback) {
            callback($country, $(citySelector));
        }

    });
}
