let used = new Set();
let elements = document.getElementsByTagName('*');
for (let { className = '' } of elements) {
    for (let name of className.split(' ')) {
        if (name) {
            used.add(name);
        }
    }
}
console.log(used.values());