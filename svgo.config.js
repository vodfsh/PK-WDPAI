module.exports = {
  multipass: true,
  plugins: [
    "preset-default",
    {
      name: "addAttributesToSVGElement",
      params: {
        attributes: [{ fill: "currentColor" }],
      },
    },
  ],
};
