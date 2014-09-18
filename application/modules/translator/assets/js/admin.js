$(document).ready(function() {
    $('#fileEdit').scroll(function() {
        $('.fileLines').scrollTop($(this).scrollTop());
    });

    $('.dropdown-menu input, .dropdown-menu label').click(function(e) {
        e.stopPropagation();
    });

    // *********************** Navigate pagination *********************************************
    $('.pagination ul li').live('click', function() {
        Pagination.navigate($(this));
    });

    // *********************** GO Search *********************************************
    $('#searchTranslator').die().live('click', function() {
        Search.go();
    });


    $('.searchObjects').die().live('change', function() {
        if ($('.searchObjects:checked').length) {
            $('.searchConditions').removeAttr('disabled');
        } else {
            $('.searchConditions').attr('disabled', '');
            $('.searchConditions').removeAttr('checked');
        }
    });

    $('.translationCancel').live('click', function() {
        $(this).next().val($(this).next().next().val());
        Translator.statisticRecount();
    });

    $('.translation').live('blur', function() {
        $(this).next().val($(this).val());
        Translator.statisticRecount();
    });
});

var Sort = {
    init: function() {
        this.per_page = $('#per_page').val();
        this.originsArray = $('#po_table tbody tr');
        this.lengthTr = this.originsArray.length;
        this.condition = false;
    },
    default: function() {
        var lang = $('#langs').val();
        var type = $('#types').val();
        var module_template = $('#modules_templates').val();
        var per_page = $('#per_page').val();
        var url = '';
        switch (type) {
            case  'modules':
                url = '/admin/components/init_window/translator/renderModulePoFile/' + module_template + '/' + type + '/' + lang + '/0/' + per_page;
                break;
            case 'templates':
                url = '/admin/components/init_window/translator/renderModulePoFile/' + module_template + '/' + type + '/' + lang + '/0/' + per_page;
                break;
            case 'main':
                url = '/admin/components/init_window/translator/renderModulePoFile/' + type + '/' + type + '/' + lang + '/0/' + per_page;
                break;
        }
        $.ajax({url: url,
            success: function(data) {
                $('#po_table tbody').html(data);
                $('.pagination ul li.active').removeClass('active');
                $($('.pagination ul li')[1]).addClass('active');
            }
        });
    },
    sortOrigins: function(curElement) {
        for (var i = 0; i < this.lengthTr; ) {
            var m_min = this.originsArray[i];
            var m_min2 = this.originsArray[i + 1];
            for (var j = i + 2; j < this.lengthTr; ) {
                if ($(curElement).hasClass('asc')) {
                    this.condition = $(this.originsArray[j]).find('.origin').text() < $(m_min).find('.origin').text();
                } else {
                    this.condition = $(this.originsArray[j]).find('.origin').text() > $(m_min).find('.origin').text();
                }
                if (this.condition) {
                    var mm = this.originsArray[i];
                    var mm2 = this.originsArray[i + 1];
                    m_min = this.originsArray[j];
                    m_min2 = this.originsArray[j + 1];
                    this.originsArray[i] = m_min;
                    this.originsArray[i + 1] = m_min2;
                    this.originsArray[j] = mm;
                    this.originsArray[j + 1] = mm2;
                }
                j += 2;
            }
            i += 2;
        }
    },
    sortTranslations: function(curElement) {
        for (var i = 0; i < this.lengthTr; ) {
            var m_min = this.originsArray[i + 1];
            var m_min2 = this.originsArray[i];
            for (var j = i + 2; j < this.lengthTr; ) {
                if ($(curElement).hasClass('asc')) {
                    this.condition = $(this.originsArray[j + 1]).find('.translation').text() < $(m_min).find('.translation').text();
                } else {
                    this.condition = $(this.originsArray[j + 1]).find('.translation').text() > $(m_min).find('.translation').text();
                }
                if (this.condition) {
                    var mm = this.originsArray[i + 1];
                    var mm2 = this.originsArray[i];
                    m_min = this.originsArray[j + 1];
                    m_min2 = this.originsArray[j];
                    this.originsArray[i + 1] = m_min;
                    this.originsArray[i] = m_min2;
                    this.originsArray[j + 1] = mm;
                    this.originsArray[j] = mm2;
                }
                j += 2;
            }
            i += 2;
        }
    },
    sortComments: function(curElement) {
        for (var i = 0; i < this.lengthTr; ) {
            var m_min = this.originsArray[i];
            var m_min2 = this.originsArray[i + 1];
            for (var j = i + 2; j < this.lengthTr; ) {
                if ($(curElement).hasClass('asc')) {
                    this.condition = $(this.originsArray[j]).find('.comment').text() < $(m_min).find('.comment').text();
                } else {
                    this.condition = $(this.originsArray[j]).find('.comment').text() > $(m_min).find('.comment').text();
                }
                if (this.condition) {
                    var mm = this.originsArray[i];
                    var mm2 = this.originsArray[i + 1];
                    m_min = this.originsArray[j];
                    m_min2 = this.originsArray[j + 1];
                    this.originsArray[i] = m_min;
                    this.originsArray[i + 1] = m_min2;
                    this.originsArray[j] = mm;
                    this.originsArray[j + 1] = mm2;
                }
                j += 2;
            }
            i += 2;
        }
    },
    sortFuzzy: function(curElement) {
        this.init();
        var findContent = '';
        var leftContent = '';
        var condition = false;
        var fuzzy = $(curElement);

        $('#po_table tbody tr.originTR').each(function(iteration) {
            if (fuzzy.hasClass('asc')) {
                condition = $(this).find('.btn-danger').length;
            } else {
                condition = !$(this).find('.btn-danger').length;
            }
            if (condition) {
                findContent += $(this)[0].outerHTML + $(this).next()[0].outerHTML;
            } else {
                leftContent += $(this)[0].outerHTML + $(this).next()[0].outerHTML;
            }
        });

        var content = findContent + leftContent;
        if (content) {
            this.showResults(curElement, content);
        }
    },
    showResults: function(curElement, results) {
        $('#po_table tbody').html(results);

        var per_page = this.per_page;
        $('#po_table tbody tr').each(function(iteration) {
            iteration = iteration / 2;
            if (iteration < per_page) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });

        $(curElement).addClass('active');
        if ($(curElement).hasClass('asc')) {
            $(curElement).removeClass('asc').addClass('desc');
        } else {
            $(curElement).removeClass('desc').addClass('asc');
        }
    },
    go: function(curElement) {
        this.init();

        if ($(curElement).hasClass('originHead')) {
            this.sortOrigins(curElement);
        }

        if ($(curElement).hasClass('translation')) {
            this.sortTranslations(curElement);
        }

        if ($(curElement).hasClass('comment')) {
            this.sortComments(curElement);
        }

        var results = '';
        $(this.originsArray).each(function() {
            results += $(this)[0].outerHTML;
        });

        this.showResults(curElement, results);

    }
};

var Search = {
    perPage: 0,
    searchedObject: [],
    searchedObjectLength: 0,
    findValues: [],
    undiscoveredValues: [],
    condition: false,
    searchString: '',
    minSearchStringLength: 1,
    table: '#po_table tbody',
    tableTrs: '#po_table tbody tr',
    searchOptions: '.searchTranslatorOptions input',
    countResults: 0,
    init: function() {
        this.perPage = $('#per_page').val();
        this.searchedObject = $('#po_table tbody tr');
        this.searchedObjectLength = this.searchedObject.length;
        this.searchString = $('.searchString').val();
    },
    origin: function() {
        this.init();
        for (var i = 0; i < this.searchedObjectLength; ) {
            var origin = $(this.searchedObject[i]).find('.origin').text();
            if (this.checkCondition(origin)) {
                this.countResults += 1;
                $(this.searchedObject[i]).find('.origin').addClass('searched');
                this.findValues.push(this.searchedObject[i]);
                this.findValues.push(this.searchedObject[i + 1]);
            } else {
                $(this.searchedObject[i + 1]).find('.translation').removeClass('searched');
                $(this.searchedObject[i]).find('.origin').removeClass('searched');
                $(this.searchedObject[i]).find('.comment').removeClass('searched');
                this.undiscoveredValues.push(this.searchedObject[i]);
                this.undiscoveredValues.push(this.searchedObject[i + 1]);
            }
            i = i + 2;
        }
    },
    translation: function() {
        this.init();
        for (var i = 0; i < this.searchedObjectLength; ) {
            var translate = $(this.searchedObject[i + 1]).find('.translation').text();
            if (this.checkCondition(translate)) {
                this.countResults += 1;
                $(this.searchedObject[i + 1]).find('.translation').addClass('searched');
                this.findValues.push(this.searchedObject[i]);
                this.findValues.push(this.searchedObject[i + 1]);
            } else {
                $(this.searchedObject[i + 1]).find('.translation').removeClass('searched');
                if (!$('#originSearch').attr('checked')) {
                    $(this.searchedObject[i]).find('.origin').removeClass('searched');
                }
                $(this.searchedObject[i]).find('.comment').removeClass('searched');
                this.undiscoveredValues.push(this.searchedObject[i]);
                this.undiscoveredValues.push(this.searchedObject[i + 1]);
            }
            i = i + 2;
        }

    },
    comment: function() {
        this.init();
        for (var i = 0; i < this.searchedObjectLength; ) {
            var comment = $(this.searchedObject[i]).find('.comment').text();
            if (this.checkCondition(comment)) {
                $(this.searchedObject[i]).find('.comment').addClass('searched');
                this.findValues.push(this.searchedObject[i]);
                this.findValues.push(this.searchedObject[i + 1]);
            } else {
                if (!$('#translationSearch').attr('checked')) {
                    this.countResults += 1;
                    $(this.searchedObject[i + 1]).find('.translation').removeClass('searched');
                }
                if (!$('#originSearch').attr('checked')) {
                    $(this.searchedObject[i]).find('.origin').removeClass('searched');
                }
                $(this.searchedObject[i]).find('.comment').removeClass('searched');

                this.undiscoveredValues.push(this.searchedObject[i]);
                this.undiscoveredValues.push(this.searchedObject[i + 1]);
            }
            i = i + 2;
        }
    },
    checkCondition: function(string) {
        var sensitive = $('#sensitiveSearch').attr('checked');
        if ($('#regularSearch').attr('checked')) {
            if (sensitive) {
                return string.match(new RegExp(this.searchString, 'g'));
            } else {
                return string.match(new RegExp(this.searchString, 'gi'));
            }

        } else {
            if ($('#fullStringSearch').attr('checked')) {
                return string == this.searchString;

            } else {
                if (sensitive) {
                    return string.indexOf(this.searchString) != -1;
                } else {
                    return string.toLowerCase().indexOf(this.searchString.toLowerCase()) != -1;
                }
            }
        }
    },
    displayResults: function() {
        var all = '';
        $(this.findValues.concat(this.undiscoveredValues)).each(function() {
            all += $(this)[0].outerHTML;
        })
        $(this.table).html(all);

        var searchObj = this;
        $(this.tableTrs).each(function(iteration) {
            iteration = iteration / 2;
            if (iteration < searchObj.perPage) {
                $(this).css('display', 'table-row');
            } else {
                $(this).css('display', 'none');
            }
        });
        this.findValues = [];
        this.undiscoveredValues = [];
    },
    canSearch: function() {
        var can = false;
        $(this.searchOptions).each(function() {
            if ($(this).attr('checked')) {
                can = true;
            }
        });
        return can;
    },
    go: function() {
        this.init();
        if (this.canSearch()) {
            if (this.searchString && this.searchString.length > this.minSearchStringLength) {
                if ($('#originSearch').attr('checked')) {
                    this.origin();
                    this.displayResults();
                }

                if ($('#translationSearch').attr('checked')) {
                    this.translation();
                    this.displayResults();
                }

                if ($('#commentSearch').attr('checked')) {
                    this.comment();
                    this.displayResults();
                }
                $('.pagination ul li.active').removeClass('active');
                $($('.pagination ul li')[1]).addClass('active');

                if (this.countResults) {
                    showMessage('Message', 'Was found ' + this.countResults + 'results');
                } else {
                    showMessage('Message', 'Was not found any results', 'r')
                }
                this.countResults = 0;
            } else {
                showMessage('Error', 'Please, enter more than 1 symbol', 'r')
            }
        } else {
            showMessage('Error', 'You did not select search criteria', 'r')
        }
    }

};

var Selectors = {
    init: function(curElement) {
        this.lang = $(curElement).closest('.poSelectorsHolder').find('#langs').val();
        this.type = $(curElement).closest('.poSelectorsHolder').find('#types').val();
        this.module_tempate = $(curElement).closest('.poSelectorsHolder').find('#modules_templates').val();
        this.per_page = parseInt($('#per_page').val());
    },
    clearContent: function() {
        $('#po_table tbody').html('');
        $('#po_table').hide();
        $('.pagination ul').html('');
        $('#per_page').hide();
        $('.pathHolder').html('');
        $('.pathParseHolder').hide();
        $('.statistic').hide();
    },
    langs: function(curElement) {
        this.init(curElement);

        if (this.lang) {
            $(curElement).closest('.poSelectorsHolder').find('#types').css('display', 'inline-block');
        } else {
            this.clearContent();
            $(curElement).closest('.poSelectorsHolder').find('#types').hide().val('');
            $(curElement).closest('.poSelectorsHolder').find('#modules_templates').val('');
            $(curElement).closest('.poSelectorsHolder').find('#modules_templates').hide().html('');

            return false;
        }

        if (!this.type) {
            this.clearContent();
        } else {
            if (this.module_tempate || this.type == 'main') {
                if (this.type == 'main')
                    this.module_tempate = 'main';

                var url = '/admin/components/init_window/translator/renderModulePoFile/' + this.module_tempate + '/' + this.type + '/' + this.lang + '/0/' + this.per_page;
                this.renderTable(url);
            }
        }
    },
    types: function(curElement) {
        this.init(curElement);
        this.clearContent();

        if (this.type) {
            $(curElement).closest('.poSelectorsHolder').find('#modules_templates').css('display', 'inline-block');
        } else {
            $(curElement).closest('.poSelectorsHolder').find('#modules_templates').hide().html('');
        }

        switch (this.type) {
            case 'modules':
                var url = '/admin/components/init_window/translator/renderModulesNames/' + this.lang;
                this.renderNames(url, curElement);
                break;
            case 'templates':
                var url = '/admin/components/init_window/translator/renderTemplatesNames/' + this.lang;
                this.renderNames(url, curElement);
                break;
            case 'main':
                $(curElement).closest('.poSelectorsHolder').find('#modules_templates').css('display', 'none');
                var url = '/admin/components/init_window/translator/renderModulePoFile/' + this.type + '/' + this.type + '/' + this.lang + '/0/' + this.per_page;
                this.renderTable(url);
                break;
        }
    },
    names: function(curElement) {
        this.init(curElement);

        if (!this.module_tempate) {
            this.clearContent();
            return false;
        }

        var url = '/admin/components/init_window/translator/renderModulePoFile/' + this.module_tempate + '/' + this.type + '/' + this.lang + '/0/' + this.per_page;
        this.renderTable(url);

    },
    renderTable: function(url) {
        $.ajax({url: url,
            success: function(data) {
                Translator.render(data);

            }
        });
    },
    renderNames: function(url, curElement) {
        $.ajax({url: url,
            success: function(data) {
                $(curElement).closest('.poSelectorsHolder').find('#modules_templates').html(data);
            }
        });
    }
};

var Translator = {
    filePath: '',
    init: function() {
        this.lang = $('#langs').val();
        this.type = $('#types').val();
        this.module_template = $('#modules_templates').val();
        this.per_page = parseInt($('#per_page').val());
    },
    getUrl: function(methodName) {
        switch (this.type) {
            case  'modules':
                return '/admin/components/init_window/translator/' + methodName + '/' + this.module_template + '/' + this.type + '/' + this.lang;
                break;
            case 'templates':
                return '/admin/components/init_window/translator/' + methodName + '/' + this.module_template + '/' + this.type + '/' + this.lang;
                break;
            case 'main':
                return '/admin/components/init_window/translator/' + methodName + '/' + this.type + '/' + this.type + '/' + this.lang;
                break;
        }
    },
    statisticRecount: function() {
        var totalStrings = $('textarea.origin').length;
        var fuzzyCount = $('.fuzzyTD .btn-danger').length;
        var translated = 0;
        var notTranslated = 0;

        $('textarea.translation').each(function() {
            if ($(this).val()) {
                translated++;
            } else {
                notTranslated++;
            }
        });

        $('.statistic').show();
        $('.allStringsCount').html(totalStrings);
        $('.notTranslatedStringsCount').html(notTranslated);
        $('.translatedStringsCount').html(translated);
        $('.fuzzyStringsCount').html(fuzzyCount);

    },
    createFile: function(curElement) {
        this.init();
        if (this.lang && this.type) {
            window.location.href = this.getUrl('createFile');
        }
    },
    render: function(data) {
        if (data === 'no file') {
            $('#po_table tbody').html('');
            $('#po_table').css('display', 'none');
            $('.pagination ul').html('');
            $('.fileNotExist').show();
            $('.pathHolder').html('');
            $('.po_settings').html('');
            $('.pathParseHolder').hide();
            return false;
        }

        $('#cancel').removeAttr('disabled');
        if (!data) {
            $('#po_table tbody').html('');
            $('#po_table').css('display', 'none');
            $('.pagination ul').html('');
            $('.alert-info').css('display', 'block');

            return false;
        } else {
            $('.alert-info').css('display', 'none');
            $('#per_page').css('display', 'block');

            $('#po_table tbody').html(data);
            $('#po_table').css('display', 'table');

            this.statisticRecount();

            var paths = $('.pathHolderClone').html();
            $('.pathHolder').html(paths);
            $('.pathParseHolder').show();

            var po_settings = $('.po_settingsClone').html();
            $('.po_settingsClone').html('');
            $('.po_settings').html(po_settings);

            $('#per_page option:selected').removeAttr('selected');
            $($('#per_page option')[0]).attr('selected', 'selected');

            Pagination.generate();
        }


    },
    translateString: function(curElement) {
        var YandexApiKey = $.trim($('.YandexApiKey').val());
        var originLang = $('#originLang').val();

        if (!YandexApiKey) {
            showMessage('Error', 'You have not specified Yandex Api Key.', 'r');
            return false;
        }

        if (!originLang) {
            showMessage('Error', 'You have not specified origins strings language.', 'r');
            return false;
        }

        var word = $.trim($(curElement).next('.origin').val());
        var originTR = $(curElement).closest('tr');
        var translationTR = originTR.next();
        var translation = translationTR.find('.translation').val();
        var lang = $('#langs').val();
        lang = lang.split("_", 1);

        translationTR.find('.translationTEMP').val(translation);
        translationTR.find('.translationCancel').show();
        $.ajax({
            type: 'POST',
            data: {
                word: word
            },
            url: '/admin/components/init_window/translator/translateWord/' + lang,
            success: function(Answer) {
                Answer = JSON.parse(Answer);
                if (Answer.code == '200') {
                    translationTR.find('.translation').val(Answer.text[0]);
                    Translator.statisticRecount();
                }
            }
        });
    },
    setOriginsLang: function(curElement) {
        var originLang = $(curElement).val();
        $.ajax({
            type: "POST",
            data: {
                originsLang: originLang
            },
            url: '/admin/components/init_window/translator/setSettings',
            success: function(data) {
            }
        });
    },
    markFuzzy: function(curElement) {
        if ($(curElement).hasClass('btn-danger')) {
            $(curElement).removeClass('btn-danger');
        } else {
            $(curElement).addClass('btn-danger');
        }
        this.statisticRecount();
    },
    addNewPath: function(curElement) {
        var newPath = $(curElement).prev().html();
        var pathNumber = (parseInt($.trim($($('.pathHolder div b')[$('.pathHolder div b').length - 1]).html())) + 1) + '.';
        if (pathNumber == 'NaN.') {
            pathNumber = 2 + '.';
        }
        $('.pathHolder').append(newPath);
        $($('.pathHolder div b')[$('.pathHolder div b').length - 1]).html(pathNumber);
    },
    deletePath: function(curElement) {
        $(curElement).parent().remove();
    },
    parse: function(curElement) {
        this.init();

        $.ajax({
            url: this.getUrl('updatePoFile'),
            type: 'POST',
            data: {
                paths: this.getPaths()
            },
            success: function(data) {
                if (data) {
                    var results = JSON.parse(data);
                    $('.modal_update_results').removeClass('hide').removeClass('fade');
                    $('.modal_update_results').modal('show');
                    $('.modal-backdrop').show();
                    $('.newStrings').html('');
                    $('.obsoleteStrings').html('');

                    for (var newString in results['new']) {
                        if (newString) {
                            var paths = [];

                            for (var path in results['new'][newString]) {
                                paths.push(results['new'][newString][path]);
                            }

                            $('.newStrings').append('<span data-paths=\'' + JSON.stringify(paths) + '\'>' + escapeHtml(newString) + '</span><br>');
                        }
                    }

                    for (var obsoleteString in results['old']) {
                        if (obsoleteString && obsoleteString != '0') {
                            $('.obsoleteStrings').append('<span>' + escapeHtml(obsoleteString) + '</span><br>');
                        }
                    }
//                    console.log(results['new'])
//                    $('.parsedNewStringsCount').html(results['new']);
//                    $('.parsedRemoveStringsCount').html(results['old']);

                }
            }
        });
    },
    update: function(curElement) {
        this.init();
        var newStrings = {};
        var obsoleteStrings = {};
        var results = {};

        $('.newStrings span').each(function() {
            newStrings[$(this).text()] = $(this).data('paths');
        });

        $('.obsoleteStrings span').each(function() {
            obsoleteStrings[$(this).text()] = $(this).text();
        });

        results['new'] = newStrings;
        results['old'] = obsoleteStrings;

        $.ajax({
            url: this.getUrl('update'),
            type: 'POST',
            data: {
                results: JSON.stringify(results)
            },
            success: function(data) {
                $('.modal_update_results').addClass('hide').addClass('fade');
                $('.modal_update_results').modal('hide');
                $('.modal-backdrop').hide();
                $('#po_table tbody').html(data);
                $('.pagination ul li.active').removeClass('active');
                $($('.pagination ul li')[1]).addClass('active');
                $('.per_page10').attr('selected', 'selected');
                Pagination.generate();
                Translator.statisticRecount();
            }
        });
    },
    save: function() {
        this.init();

        var po_array = this.getPoArray();
        po_array['paths'] = this.getPaths();
        po_array['po_settings'] = {};
        po_array['po_settings']['projectName'] = $('input[name=projectName]').val();
        po_array['po_settings']['translatorEmail'] = $('input[name=translatorEmail]').val();
        po_array['po_settings']['translatorName'] = $('input[name=translatorName]').val();
        po_array['po_settings']['langaugeTeamName'] = $('input[name=langaugeTeamName]').val();
        po_array['po_settings']['langaugeTeamEmail'] = $('input[name=langaugeTeamEmail]').val();
        po_array['po_settings']['language'] = $('input[name=language]').val();
        po_array['po_settings']['country'] = $('input[name=country]').val();

        $.ajax({
            type: 'POST',
            data: {
                po_array: JSON.stringify(po_array)
            },
            url: this.getUrl('savePoArray'),
            success: function(data) {
            }
        });
    },
    cancel: function() {
        this.init();
        if (this.lang && this.type && this.module_template) {
            $.ajax({
                url: this.getUrl('canselTranslation'),
                success: function(data) {
                }
            });
        }
    },
    start: function(data, names, type, lang, name) {
        $($('.' + lang)[0]).attr('selected', '');
        $('#types').css('display', 'inline-block');
        $($('.' + type)[0]).attr('selected', '');

        if (type !== 'main') {
            $('#modules_templates').css('display', 'inline-block');
            $('#modules_templates').html(names);
        }

        $($('.' + name)[0]).attr('selected', '');
        $('#per_page').css('display', 'inline-block');

        if (data) {
            this.render(data);
        }
    },
    getPaths: function() {
        var pathHorders = $('.pathHolder .path input[name^="path"]');
        var paths = [];

        $(pathHorders).each(function() {
            paths.push($(this).val());
        });
        return paths;
    },
    correctPaths: function(curElement) {
        this.init();
        $.ajax({
            url: this.getUrl('makeCorrectPoPaths'),
            type: 'POST',
            data: {
                paths: this.getPaths()
            },
            success: function(data) {
                if (data) {
                    $('#po_table tbody').html(data);
                }
            }
        });
    },
    openFileToEdit: function(curElement) {
        var filePath = $(curElement).val();
        var line = filePath.slice(filePath.indexOf(':') + 1, filePath.length);
        filePath = filePath.slice(2, filePath.indexOf(':'));
        this.filePath = filePath;

        var url = '/admin/components/init_window/translator/renderFile';
        $.ajax({
            type: 'POST',
            data: {
                filePath: filePath
            },
            url: url,
            success: function(data) {
                var fileContent = JSON.parse(data);
                var selectionText = '';
                $('.fileEdit').val('');
                $('.fileLines').html('');
                for (var fileLine in fileContent) {
                    var newLine = (parseInt(fileLine) + 1) + ': <br>';
                    var lines = $('.fileLines').html();
                    var editVal = $('.fileEdit').val();

                    if ((parseInt(fileLine) + 1) == line) {
                        selectionText = fileContent[fileLine];
                        $('.fileLines').html(lines + '<span style="background-color: cornflowerblue; margin-left: -5px; padding-left: 5px;width: 100%;display: block;">' + newLine + '</span>');
                        $('.fileEdit').val(editVal + fileContent[fileLine]);
                    } else {
                        $('.fileLines').html(lines + newLine);
                        $('.fileEdit').val(editVal + fileContent[fileLine]);
                    }
                    Translator.selectTextLine($('#fileEdit'), $.trim(selectionText), $.trim(selectionText));
                }
            }
        });
        $('.modal_file_edit').modal();
    },
    saveEditingFile: function(curElement) {
        var fileText = $('.fileEdit').val();
        var url = '/admin/components/init_window/translator/saveEditingFile';
        $.ajax({
            type: 'POST',
            data: {
                filePath: Translator.filePath,
                content: fileText
            },
            url: url,
            success: function(data) {

            }
        });

    },
    selectTextLine: function(element, selectionLine, selectionText) {
        var posi = element.val().indexOf(selectionLine); // take the position of the word in the text
        if (posi != -1) {
            var target = element[0];
            // select the textarea and the word
            target.focus();
            if (target.setSelectionRange)
                target.setSelectionRange(posi, posi + selectionText.length - 1);
            else {
                var r = target.createTextRange();
                r.collapse(true);
                r.moveEnd('character', posi + selectionLine);
                r.moveStart('character', posi);
                r.select();
            }
            var line_ht = element.css('line-height').replace('px', ''); //height in pixel of each row
            var n_lines = target.scrollHeight / line_ht; // the total amount of lines
            var char_in_line = element.val().length / n_lines; // amount of chars for each line
            var height = Math.floor(posi / char_in_line) - 10; // amount of lines in the textarea
            element.scrollTop(height * line_ht); // scroll to the selected line
        }
    },
    translate: function(curElement) {
        var YandexApiKey = $.trim($('.YandexApiKey').val());
        var originLang = $('#originLang').val();

        if (!YandexApiKey) {
            showMessage('Error', 'You have not specified Yandex Api Key.', 'r');
            return false;
        }

        if (!originLang) {
            showMessage('Error', 'You have not specified origins strings language.', 'r');
            return false;
        }

        var lang = $('#langs').val();
        lang = lang.split("_", 1);

        this.init();
        $.ajax({
            type: 'POST',
            data: {
                po_array: JSON.stringify(this.getPoArray()),
                lang: lang
            },
            url: this.getUrl('translate'),
            success: function(data) {
                if (data) {
                    $('#po_table tbody').html(data);
                    Translator.statisticRecount();
                }
            }
        });
    },
    getPoArray: function() {
        var origins = $('#po_table .originTR');
        var translations = $('#po_table .translationTR');

        var po_array = {};
        for (var i = 0; i < origins.length; i++) {
            var links = [];
            origin = $(origins[i]).find('.origin').text();
            comment = $(origins[i]).find('.comment').val();
            links_select = $(origins[i]).find('select.links option');
            fuzzy = $(origins[i]).find('.notCorrect').hasClass('btn-danger');

            $(links_select).each(function() {
                links.push($(this).val());
            });

            translation = $(translations[i]).find('.translation').val();
            po_array[origin] = {
                'translation': translation,
                'fuzzy': fuzzy,
                'comment': comment,
                'links': links
            };
        }
        return po_array;

    },
    addYandexApiKey: function(curElement) {
        var YandexApiKey = $.trim($('.YandexApiKey').val());
        $.ajax({
            type: "POST",
            data: {
                YandexApiKey: YandexApiKey
            },
            url: '/admin/components/init_window/translator/setSettings',
            success: function(data) {
            }
        });
    }
};



var Pagination = {
    generate: function() {
        if ($('#langs').val()) {
            $('.pagination').show();
        }

        var page_number = $('#page_number').val();
        var per_page = parseInt($('#per_page').val());
        var rows_count = Math.ceil(($('#po_table tbody tr').length / 2) / per_page);
        if (10 < rows_count) {
            var to = 10;
        } else {
            var to = rows_count;
        }

        var pages = "<li><a>< First</a></li><li data-number='1'><span>1</span></li>";
        if (page_number == 1) {
            pages = "<li><a>< First</a></li><li class='active' data-number='1'><span>1</span></li>";
        }

        var i = 2;
        while (i <= to) {
            if (rows_count == i - 1)
                break;
            var active = '';
            if (page_number == i)
                active = 'active';

            pages += "<li class='" + active + "' data-number='" + i + "'><span>" + i + "</span></li>";
            i++;
        }
        pages += "<li data-number='" + rows_count + "'><a>Last ></a></li>";

        $('.pagination ul').html(pages);
    },
    navigate: function(curElement) {
        var module = $('#modules_templates').val();
        var lang = $('#langs').val();
        var type = $('#types').val();
        var per_page = parseInt($('#per_page').val());
        var offset = (parseInt($(curElement).data('number')) - 1) * per_page;
        var page = parseInt($(curElement).data('number'));

        if (type == 'main')
            module = 'main';

        $('#po_table tbody tr').each(function(iteration) {
            iteration = iteration / 2;
            if ((iteration >= offset) && (iteration < per_page + offset)) {
                $(this).css('display', 'table-row');
            } else {
                $(this).css('display', 'none');
            }
        });
        var rows_count = Math.ceil(($('#po_table tbody tr').length / 2) / per_page);
        var pages = '<li  data-number="1"><a>< First</a></li>';
        var from = 1;
        var plus_to = 0;

        if (page > 6) {
            from = page - 5;
        } else {
            plus_to = 10 - 5 - page;
        }

        var to = rows_count;
        var minus_from = 0;
        if (page + 5 < rows_count) {
            to = page + 5;
        } else {
            if (!(page < 5))
                minus_from = 5 - (rows_count - page);
        }

        if (minus_from > from)
            minus_from = 0;

        if (plus_to + page > rows_count)
            plus_to = 0;


        if (rows_count < 10) {
            to = rows_count;
            plus_to = 0;
        }
        var i = from - minus_from;
        while (i <= to + plus_to) {
            if (i == page) {
                pages += "<li class='active' data-number='" + i + "'><span>" + i + "</span></li>";
            } else {
                pages += "<li data-number='" + i + "'><span>" + i + "</span></li>";
            }

            i++;
        }
        pages += "<li data-number='" + rows_count + "'><a>Last ></a></li>";
        $('.pagination ul').html(pages);
    },
    perPage: function() {
        var perPageCurrent = parseInt($('#per_page').val());

        $('#po_table tbody tr').each(function(iteration) {
            iteration = iteration / 2;
            if (iteration < perPageCurrent) {
                $(this).css('display', 'table-row');
            } else {
                $(this).css('display', 'none');
            }
        });

        this.generate()
    }

}

var CreatePoFile = {
    addPath: function(curElement) {
        var path = $.trim($(curElement).next().val());
        var pathSelector = $(curElement).next().next();
        $(pathSelector).append('<option selected value="' + path + '">' + path + '</option>')
        $(curElement).next().val('');
    }
};

var Exchange = {
    go: function(curElement) {
        var langExchanger = $('.exchanger #langs').val();
        var langReceiver = $('.receiver #langs').val();

        var typeExchanger = $('.exchanger #types').val();
        var typeReceiver = $('.receiver #types').val();

        var modules_templatesExchanger = $('.exchanger #modules_templates').val();
        var modules_templatesReceiver = $('.receiver #modules_templates').val();

        $.ajax({
            type: 'POST',
            data: {
                langExchanger: langExchanger,
                langReceiver: langReceiver,
                typeExchanger: typeExchanger,
                typeReceiver: typeReceiver,
                modules_templatesExchanger: modules_templatesExchanger,
                modules_templatesReceiver: modules_templatesReceiver
            },
            url: '/admin/components/init_window/translator/exchangeTranslation',
            success: function(data) {
                if (data) {
                    $('#mainContent').html(data);
                    window.history.pushState({}, "", "/admin/components/init_window/translator");
                }
            }
        });
    }
};

function escapeHtml(text) {
    return text
            .replace(/&/g, "&amp;")
            .replace(/</g, "&lt;")
            .replace(/>/g, "&gt;")
            .replace(/"/g, "&quot;")
            .replace(/'/g, "&#039;");
}