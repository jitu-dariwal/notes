var funcs = {
    Add: function (x, y) {
        return x + y;
    },
    Sub: function (x, y) {
        return x - y;
    },
    Substr: function (str, from) {
        if (!str)
            throw new Error("In the 'Substr' function the first parameter is not defined!");
        if (typeof str !== "string")
            throw new Error("The 'Substr' function accepts a string for the first parameter which is not a string!");
        return str.substr(from);
    },
    majid: function () {
        return "majid";
    },
    test: function (x) {
        return x * 2;
    }
};

$(function () {
    $('#txt2').expressionBuilder({
        variables: [
            {
                variableId: "v1",
                name: 'FirstName'
            },
            {
                variableId: "v2",
                name: 'LastName'
            }
        ],
        suggestions: "up",
        expression: "[v2] + 35"
    });
});
//# sourceMappingURL=index.js.map