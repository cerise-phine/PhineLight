/********************************************************* jQuery AJAX Loader */
$(document).ready(function(){
    $('body').on('click','.AJAX',function(e){
        e.preventDefault();
        View = ($(this).attr('data-view')) ? $(this).attr('data-view') : false;
        Container = ($(this).attr('data-container')) ? $(this).attr('data-container') : false;
        GetVar = ($(this).attr('data-getvar')) ? $(this).attr('data-getvar') : false;
        ContainerOpen = ($(this).attr('data-open')) ? $(this).attr('data-open') : false;
        ContainerClose = ($(this).attr('data-close')) ? $(this).attr('data-close') : false;
        Push = ($(this).attr('data-push')) ? $(this).attr('data-push') : false;
        PostView = ($(this).attr('data-post-view')) ? $(this).attr('data-post-view') : false;
        PostContainer = ($(this).attr('data-post-container')) ? $(this).attr('data-post-container') : false;
        PostGet = ($(this).attr('data-post-get')) ? $(this).attr('data-post-get') : false;
        if(ContainerClose !== false){ CloseContainer(ContainerClose); }
        else if(View !== false){ Get(View,Container,GetVar,Push); }
        else{ console.error('Use of .AJAX without data-view or data-close!'); }
        if(ContainerOpen !== false){ OpenContainer(ContainerOpen); }
        if(PostContainer !== false && PostView !== false){ Get(PostView,PostContainer,PostGet,false); }
    });
    
    $('body').on('click','.FormSubmit',function(e){
        e.preventDefault();
        Form = ($(this).attr('data-form')) ? $(this).attr('data-form') : false;
        Call = ($('#'+Form).attr('data-action')) ? $('#'+Form).attr('data-action') : false;
        Container = ($('#'+Form).attr('data-container')) ? $('#'+Form).attr('data-container') : false;
        ContainerOpen = ($('#'+Form).attr('data-open')) ? $('#'+Form).attr('data-open') : false;
        if(Form !== false && Call !== false){
            DataPass = {};
            Proceed = true;
            $('form#'+Form+' :input').each(function(){
                if($(this).attr('data-passthrough')){
                    Name = $(this).attr('name');
                    Value = $(this).val();
                    Check = $(this).attr('data-passthrough');
                    Message = ($(this).attr('data-checkmsg')) ? $(this).attr('data-checkmsg') : false;
                    if(checkInput(Value, Check)){
                        ClassList = ($(this).attr('class')) ? $(this).attr('class').split(/\s+/) : false;
                        if(ClassList !== false && ClassList.includes('Err')){ $(this).removeClass('Err'); }
                        DataPass[Name] = Value;
                    }
                    else{
                        Proceed = false;
                        $(this).addClass('Err');
                    }
                }
            });
            if(Proceed === true){
                OpenContainer(ContainerOpen);
                SwitchContainer('DefaultWaitBox');
                $.post(Call,DataPass)
                    .always(function(){})
                    .done(function(data){
                        $('#'+Container).append(data);
                        SwitchContainer('DefaultWaitBox');
                        $('form#'+Form+' :input').each(function(){
                            if($(this).attr('data-passthrough')){
                                $(this).val('');
                            }
                        });
                    })
                    .fail(function(){
                        alert("Sorry there was an error!");
                    });
            }
        }
    });
});

function Get(View,Container,GetVar,Push){
    URLGetVar = (GetVar !== false) ? GetVar : '';
    URL = View + URLGetVar;
    if(Push === true){ PushURL = URL.replace('ajax','html'); }
    else if(Push !== false){ PushURL = Push; }
    if(Container !== false){ Target = $('#' + Container); }
    else{ Target = $('#DefaultContainer'); }
    Target.load(URL, function(){
        if(Push !== false){ history.pushState(PushURL,PushURL,PushURL); }
    });
}

/* Containers */
function OpenContainer(ID) {
    Window = $('#' + ID);
    ActiveClass = ID + 'Active';
    InactiveClass = ID + 'Inactive';
    $(Window).addClass(ActiveClass);
    $(Window).removeClass(InactiveClass);
}

function CloseContainer(ID){
    Window = $('#' + ID);
    Container = $('#' + ID + 'Container');
    ActiveClass = ID + 'Active';
    InactiveClass = ID + 'Inactive';
    $(Window).addClass(InactiveClass);
    $(Window).removeClass(ActiveClass);
    setTimeout(function() {
        $(Container).empty();
    }, 700);
}

function SwitchContainer(ID){
    Element = $('#' + ID);
    ClassList = Element.attr("class").split(/\s+/);
    ActiveClass = ID + 'Active';
    InactiveClass = ID + 'Inactive';
    if(ClassList.includes(InactiveClass)){
        Element.addClass(ActiveClass);
        Element.removeClass(InactiveClass);
    }
    else if(ClassList.includes(ActiveClass)){
        Element.addClass(InactiveClass);
        Element.removeClass(ActiveClass);
    }
}

function SwitchDarkMode(SessionURL){
    Wrapper = $('#ScrollWrapper');
    DarkLoad = $('#DarkLoad');
    Class = Wrapper.attr("class");
    if(Class !== 'DarkMode'){
        $(Wrapper).addClass('DarkMode');
    }
    else{
        $(Wrapper).removeClass('DarkMode');
    }
    DarkLoad.load(SessionURL, function() {});
}

function checkInput(Value, Check){
    switch(Check){
        case 'Int':
            if(Number.isInteger(Value)){ return true; }
            else{ return false; }
            break;
        case 'String':
            if(typeof Value === 'string' && Value.length !== 0){ return true; }
            else{ return false; }
            break;
        case 'Email':
            if(Value.match(/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/)){ return true; }
            else{ return false; }
            break;
    }
}

/* Debug */
function debug(Title, Var) {
    console.info('Debug Output - ' + Title + ' - ' + Date.now());
    for(const Key in Var) {
        if(Var.hasOwnProperty(Key)) {
            console.debug(`${Key} = ${Var[Key]}`);
        }
    }
}