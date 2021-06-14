<div class="container">
    <h2 class="feedbackName">Отзывы</h2>

    <div class="feedbackAll">
        <div class="content">
            <div class="tabs">
                <nav class="tabs__items">
                    <a class="tabs__item" data-tab="#tab_1">Отзывы о сайте</a>
                    <a class="tabs__item" data-tab="#tab_2">Отзывы о товаре</a>
                    <a class="tabs__item" data-tab="#tab_3">Написать отзыв</a>
                </nav>


                <div class="tabs__body">

                    <!--         Отзывы о сайте           -->
                    <div id="tab_1" class="tabs__block">

                        <?foreach ( $feedback_site as $value): ?>
                            <div class="feedback" ><strong><?=$value['name']?></strong>: <?=$value['feedback']?></div>
                        <? endforeach;?>

                    </div>

                    <!--  Отзывы о товаре -->
                    <div id="tab_2" class="tabs__block">

                            <?foreach ($feedback as $value): ?>
                                <div class="feedback" ><strong><?=$value['name']?></strong>: <?=$value['feedback']?></div>
                            <? endforeach;?>

                    </div>

                    <!--  Написать отзыв          -->
                    <div id="tab_3" class="tabs__block">

                        <div class="feedbackTabs">

                            <form action="/feedback" method="post">
                                <div><h3>Оставьте отзыв:</h3></div>

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

    <script src="scripts/tabs.js?<?php echo uniqid();?>"></script>
</div>

