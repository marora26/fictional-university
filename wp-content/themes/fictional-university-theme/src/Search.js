import $ from 'jquery';

class Search {
    // 1. describe and create/initiate our object
    constructor(){
        this.resultsDiv = $('#search-overlay__results');
        this.openButton = $(".js-search-trigger");
        this.closeButton = $(".search-overlay__close");
        this.searchOverlay = $(".search-overlay");
        this.searchField = $('#search-term');
        this.events();
        this.isSpinnerVisible = false;
        this.typingTimer();
        this.previousvalue;
    }

    // 2. events
    events(){
        this.openButton.on("click", this.openOverlay.bind(this));
        this.closeButton.on("click", this.closeOverlay.bind(this));
        $(document).on("keydown", this.keyPressDispatcher.bind(this));
        this.searchField.on("keyup", this.typingLogic.bind(this));
    }

    // 3. Methods(function, action...)

    typingLogic() {
        if(this.searchField.val() != this.previousValue){
            clearTimeout(this.typingTimer);

        if(this.searchField.val()) {
            if(!this.isSpinnerVisible){
                this.resultsDiv.html('<div class="spinner-loader"></div>');
                this.isSpinnerVisible = true;
            }
            this.typingTimer = setTimeout(this.getResults.bind(this), 2000);
        } else{
            this.resultsDiv.html('');
            this.isSpinnerVisible = false;
        }

       
        }

        
        this.previousvalue = this.searchfield.val();
    }

    getResults(){
        $.getJSON('http://localhost/fictionaluniversity-udemy/wp-json/wp/v2/posts?search=' + this.searchField.val(), posts =>{
                this.results.Div.html(`
                <h2 class="search-overlay__section-title">General Information</h2>
                    <ul class="link-list min-list">
                        <li><a href="">Click Me</a></li>
                    </ul>
                `);
        });
    }

    keyPressDispatcher  (e) {
        if(e.keyCode == 83 && !this.isOverlayOpen && !$("input, textarea") .is(':focus')){
            this.openOverlay();
        }

        if(e.keyCode == 27){
            this.closeOverlay();
        }
    }

    openOverlay(){
        this.searchOverlay.addClass("search-overlay--active");
        $("body").addClass("body-no-scroll");
    }

    closeOverlay(){
        this.searchOverlay.removeClass("search-overlay--active");
        $("body").removeClass("body-no-scroll");
    }
}

export default Search