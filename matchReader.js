function userWin() {
    $.ajax({
        type: "POST",
        url: 'setCell.php',
        data: {"winner": "1"},
        success: function () {
            alert("Вы победили! +1 уровень на ваш счёт!");
        }
    });
}

function enemyWin() {
    $.ajax({
        type: "POST",
        url: 'setCell.php',
        data: {"winner": "2"},
        success: function () {
            alert("Вы проиграли! -1 уровень :(");
        }
    });
}

function checkMatch() {
    let getDoc1 = document.getElementById("field1");
    let getDoc2 = document.getElementById("field2");
    let getDoc3 = document.getElementById("field3");
    let getDoc4 = document.getElementById("field4");
    let getDoc5 = document.getElementById("field5");
    let getDoc6 = document.getElementById("field6");
    let getDoc7 = document.getElementById("field7");
    let getDoc8 = document.getElementById("field8");
    let getDoc9 = document.getElementById("field9");

    let rt = 0;

    if (getDoc1.getAttribute("disabled") && getDoc1.classList.contains("fi-blue")) {
        if (getDoc2.getAttribute("disabled") && getDoc2.classList.contains("fi-blue")) {
            if (getDoc3.getAttribute("disabled") && getDoc3.classList.contains("fi-blue")) {
                userWin();
            }
        } else if (getDoc5.getAttribute("disabled") && getDoc5.classList.contains("fi-blue")) {
            if (getDoc9.getAttribute("disabled") && getDoc9.classList.contains("fi-blue")) {
                userWin();
            }
        } else if (getDoc4.getAttribute("disabled") && getDoc4.classList.contains("fi-blue")) {
            if (getDoc7.getAttribute("disabled") && getDoc7.classList.contains("fi-blue")) {
                userWin();
            }
        }
    } else if (getDoc3.getAttribute("disabled") && getDoc3.classList.contains("fi-blue")) {
        if (getDoc6.getAttribute("disabled") && getDoc6.classList.contains("fi-blue")) {
            if (getDoc9.getAttribute("disabled") && getDoc9.classList.contains("fi-blue")) {
                userWin();
            }
        } else if (getDoc5.getAttribute("disabled") && getDoc5.classList.contains("fi-blue")) {
            if (getDoc7.getAttribute("disabled") && getDoc7.classList.contains("fi-blue")) {
                userWin();
            }
        }
    } else if (getDoc2.getAttribute("disabled") && getDoc2.classList.contains("fi-blue")) {
        if (getDoc5.getAttribute("disabled") && getDoc5.classList.contains("fi-blue")) {
            if (getDoc8.getAttribute("disabled") && getDoc8.classList.contains("fi-blue")) {
                userWin();
            }
        }
    } else if (getDoc4.getAttribute("disabled") && getDoc4.classList.contains("fi-blue")) {
        if (getDoc5.getAttribute("disabled") && getDoc5.classList.contains("fi-blue")) {
            if (getDoc6.getAttribute("disabled") && getDoc6.classList.contains("fi-blue")) {
                userWin();
            }
        }
    } else if (getDoc7.getAttribute("disabled") && getDoc7.classList.contains("fi-blue")) {
        if (getDoc8.getAttribute("disabled") && getDoc8.classList.contains("fi-blue")) {
            if (getDoc9.getAttribute("disabled") && getDoc9.classList.contains("fi-blue")) {
                userWin();
            }
        }
    } else rt = 0;

    if (getDoc1.getAttribute("disabled") && getDoc1.classList.contains("fi-red")) {
        if (getDoc2.getAttribute("disabled") && getDoc2.classList.contains("fi-red")) {
            if (getDoc3.getAttribute("disabled") && getDoc3.classList.contains("fi-red")) {
                enemyWin();
            }
        } else if (getDoc5.getAttribute("disabled") && getDoc5.classList.contains("fi-red")) {
            if (getDoc9.getAttribute("disabled") && getDoc9.classList.contains("fi-red")) {
                enemyWin();
            }
        } else if (getDoc4.getAttribute("disabled") && getDoc4.classList.contains("fi-red")) {
            if (getDoc7.getAttribute("disabled") && getDoc7.classList.contains("fi-red")) {
                enemyWin();
            }
        }
    } else if (getDoc3.getAttribute("disabled") && getDoc3.classList.contains("fi-red")) {
        if (getDoc6.getAttribute("disabled") && getDoc6.classList.contains("fi-red")) {
            if (getDoc9.getAttribute("disabled") && getDoc9.classList.contains("fi-red")) {
                enemyWin();
            }
        } else if (getDoc5.getAttribute("disabled") && getDoc5.classList.contains("fi-red")) {
            if (getDoc7.getAttribute("disabled") && getDoc7.classList.contains("fi-red")) {
                enemyWin();
            }
        }
    } else if (getDoc2.getAttribute("disabled") && getDoc2.classList.contains("fi-red")) {
        if (getDoc5.getAttribute("disabled") && getDoc5.classList.contains("fi-red")) {
            if (getDoc8.getAttribute("disabled") && getDoc8.classList.contains("fi-red")) {
                enemyWin();
            }
        }
    } else if (getDoc4.getAttribute("disabled") && getDoc4.classList.contains("fi-red")) {
        if (getDoc5.getAttribute("disabled") && getDoc5.classList.contains("fi-red")) {
            if (getDoc6.getAttribute("disabled") && getDoc6.classList.contains("fi-red")) {
                enemyWin();
            }
        }
    } else if (getDoc7.getAttribute("disabled") && getDoc7.classList.contains("fi-red")) {
        if (getDoc8.getAttribute("disabled") && getDoc8.classList.contains("fi-red")) {
            if (getDoc9.getAttribute("disabled") && getDoc9.classList.contains("fi-red")) {
                enemyWin();
            }
        }
    } else rt = 0;

    return rt;
}

function setBField() {
    let gr = Math.floor(Math.random() * 10);
    let getDoc = document.getElementById("field" + gr);
    if (!getDoc.hasAttribute("disabled")) {
        $.ajax({
            type: "POST",
            url: 'setCell.php',
            data: {"rc": gr},
            success: function () {
                document.getElementById("field" + gr).classList.add("fi-red");
                document.getElementById("field" + gr).setAttribute("disabled", "disabled");
            }
        });
    } else {
        setBField();
    }
}

function setField(posi) {
    $.ajax({
        type: "POST",
        url: 'setCell.php',
        data: {"posi": posi},
        success: function () {
            document.getElementById("field" + posi).classList.add("fi-blue");
            document.getElementById("field" + posi).setAttribute("disabled", "disabled");
        }
    });
    checkMatch();
    setBField();
}