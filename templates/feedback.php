<div class="container">
    <h2 class="feedbackName">Отзывы</h2>

    <div class="feedbackAll">
        <div class="content">
            <div class="tabs">
                <nav class="tabs__items">
                    <a href="#tabs_01" class="tabs__item"><span>Отзывы о сайте</span></a>
                    <a href="#tabs_02" class="tabs__item"><span>Отзывы о товаре</span></a>
                    <a href="#tabs_03" class="tabs__item"><span>Написать отзыв</span></a>
                </nav>
                <div class="tabs__body">

                    <!--         Отзывы о сайте           -->
                    <div id="tabs_01" class="tabs__block">

                        <?foreach ( $feedback_site as $value): ?>
                            <div class="feedback" ><strong><?=$value['name']?></strong>: <?=$value['feedback']?></div>
                        <? endforeach;?>

                    </div>

                    <!--  Отзывы о товаре -->
                    <div id="tabs_02" class="tabs__block">

                            <?foreach ($feedback as $value): ?>
                                <div class="feedback" ><strong><?=$value['name']?></strong>: <?=$value['feedback']?></div>
                            <? endforeach;?>

                    </div>

                    <!--  Написать отзыв          -->
                    <div id="tabs_03" class="tabs__block">

                        <div class="feedbackTabs">

                            <form action="/feedback#tabs_03" method="post">
                                <div>Оставьте отзыв:</div>

                                <div class="feedback__choose">
                                    <div>
                                        <input class="inputAll feedbackTabs__tabs" type="text" name="name" placeholder="Ваше имя">
                                    </div>
                                    <div>
                                        <select class="feedbackTabs__select" name="feedback_answer" id="">
                                            <optgroup label="&#171;Выбрать сайт&#187;">
                                                <option value="site">О сайте</option>
                                            </optgroup>
                                            <optgroup label="&#171;О товаре&#187;">
                                                <option value="1">Кофе</option>
                                                <option value="2">Чай</option>
                                                <option value="3">Яблоко</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>

                                <div> <h2><?=$message?></h2></div>
                                <textarea class="feedbackTabs__textarea" name="textarea">

                                </textarea>



                                <input class="buy btnFeedback _btnBig" type="submit" value="Добавить">

                            </form>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

